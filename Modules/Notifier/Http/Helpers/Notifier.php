<?php

namespace Modules\Notifier\Http\Helpers;

use Modules\Notifier\Notifications\ManualEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notification as NotificationBase;
use Modules\Notifier\Entities\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Modules\User\Entities\Role;
use Modules\User\Entities\User;

class  Notifier extends NotificationBase {
    use Queueable;

    public $via = [];
    public $template = false;
    public $data = false;
    public $msgType = 'general';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $arr ) {
        $this->template = $arr['template'];
        $this->data     = $arr['data'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     *
     */
    public function via( $notifiable ) {
        $arr   = [];
        $arr[] = 'mail';

        return $arr;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail( $notifiable ) {

        $this->data['receiverUser']   = $notifiable;
        $this->data['receiverPerson'] = $notifiable->person;
        $data                         = $this->data;

        if ( isset( $data['emailVerify'] ) && $data['emailVerify'] ) {
            $this->data['verifyUrl'] = $this->verificationUrl( $notifiable );
        }

        $data['email_text']    = General::parseBladeCode( html_entity_decode( $this->template['text'] ), $this->data );
        $data['email_subject'] = General::parseBladeCode( html_entity_decode( $this->template['subject'] ), $this->data );


        return ( new MailMessage )
            ->subject( $data['email_subject'] )
            ->from( config( 'mail.from.address' ), config( 'mail.from.name' ) )
            ->markdown( 'notifier::mail.general', $data );

    }


    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray( $notifiable ) {
        $this->data['user'] = $notifiable;
        $message            = General::parseBladeCode( $this->template->alert, $this->data );

        return [
            'message' => $message
        ];
    }

    public function toBroadcast( $notifiable ) {
        $this->data['user'] = $notifiable;
        $message            = General::parseBladeCode( $this->template->live_alert, $this->data );

        $result = new BroadcastMessage( [
            'message' => $message,
            'msgType' => $this->msgType,
            'data'    => [ 'user' => $notifiable ]
        ] );

        return $result;
    }

    /*
     * Send notification to designed user/users
     *
     * $hook (string) Name of the hook for notification
     * $data (array) Any extra data that should be part of notification text or email
     * $user (obj User | obj User Collection) This must be object of user model if we don't want to inform to authenticated user
     *
     */
    public static function notifyUser( $hook, $data = [], $users = false ) {

        $notifications = NotificationTemplate::whereHook( $hook )->get();

        foreach ( $notifications as $notification ) {
            try {
                \Notification::send( $users, ( new static( [ 'template' => $notification, 'data' => $data ] ) ) );
            } catch ( \Exception $e ) {
                \Log::error( 'Notification failed', $data );
            }
        }

        return true;
    }

    /*
     * This is interface method that needs to be called when we need to alert current/target user's relations
     *
     * $hook (string) Name of the hook for notification
     * $data (array) Any extra data that should be part of notification text or email
     * $user (obj User) This must be object of user model if we don't want to inform to authenticated user
     *
     */
    public static function notify( $hook, $data = [], $user = false, $person = false ) {

        if ( ! $user && ! Auth::check() ) {
            return false;
        } elseif ( ! $user ) {
            $user = Auth::user();
        }

        $notifications = Notification::with('emailNotification')->whereHook( $hook )->get();

        if ( ! $notifications ) {
            return false;
        }

        foreach ( $notifications as $notification ) {

            if ( $notification->target == 'admin' ) {

                if (Role::whereName('superadmin')->exists()) {
                    $users = User::role('superadmin')->get();
                }else{
                    continue;
                }

            } elseif ( $notification->target == 'self' && $notification->lang == $user->lang ) {
                $users = $user;
            } else {
                continue;
            }


            if ( isset( $users->id ) ) {
                $usersData               = $users;
                $users                   = []; //in case there is some data already exsists
                $users[ $usersData->id ] = $usersData;
            } else {

                $users = $users->keyBy( 'id' );
            }
            $notification = $notification->toArray();
            $data['text']    = $notification['email_notification']['html_body'];
            $data['subject'] = $notification['email_notification']['subject'];
            //Add Basic Info to Data Set
            $data['appData']          = new \stdClass();
            $data['appData']->url     = URL::to( '/' );
            $data['appData']->siteUrl = env('APP_URL');
            $data['appData']->name    = config( 'app.name' );
            $data['targetPerson']     = $user;

            if ( $users && count( $users ) > 0 ) {
                try {
                    \Notification::send( $users, ( new static( [ 'template' => $data, 'data' => $data ] ) ) );

                } catch ( \Exception $e ) {
                    Log::error( 'Notification failed with error: ' . $e->getMessage(), $data );
                }
            }
        }

        return true;

    }

    public static function manualEmail( $to, $subject, $text ) {

        $data['text']    = $text;
        $data['subject'] = $subject;
        $data['email_text'] = $text;
        //Add Basic Info to Data Set
        $data['appData']          = new \stdClass();
        $data['appData']->url     = URL::to( '/' );
        $data['appData']->siteUrl = env('APP_URL');
        $data['appData']->name    = config( 'app.name' );


        try {
          \Notification::route('mail', $to)
                ->notify(new ManualEmail($data));
        } catch ( \Exception $e ) {
            Log::error( 'Notification failed with error: ' . $e->getMessage(), $data );
        }
        return true;
    }


    /**
     * Get the verification URL for the given notifiable.
     *
     * @param mixed $notifiable
     *
     * @return string
     */
    protected function verificationUrl( $notifiable ) {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes( Config::get( 'auth.verification.expire', 60 ) ),
            [
                'id'   => $notifiable->getKey(),
                'hash' => sha1( $notifiable->getEmailForVerification() ),
            ]
        );
    }
}
