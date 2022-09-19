<?php

namespace App\Providers;


use App\Http\Controllers\TraitClasses\SessionTrait;
use App\Http\Controllers\Traits\MiddlewareTraits\UserHasAccessMiddlewareTrait;
use App\Policies\UserCanPermissionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    use UserHasAccessMiddlewareTrait;
    use SessionTrait;
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        UserCanPermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
 Gate::after(function ($user, $ability) {

            $getPermissionRights = $getPermissionRightsArray = "";
            $getPermissionRightsArray = [];

            if( strpos($ability, '=') !== false ){

                $getAbilities = explode("=", $ability);
                $getPermissionName = $getAbilities[0];
                $getPermissionRights = $getAbilities[1];

                if( !empty($getPermissionRights) && strpos($getPermissionRights, '|') !== false ){
                    $getPermissionRightsArray = explode("|", $getPermissionRights);
                } else {
                    array_push( $getPermissionRightsArray, $getPermissionRights);
                }

                try {

                    $checkUserAbility = $this->userCanPermissionRightsAccess($getPermissionName, $getPermissionRightsArray);

                    return $checkUserAbility;

                } catch (\Exception $e){
                    self::customSessionMessage(1, "Error", " INVALID PERMISSION RIGHTS");
                    return false;
                }

            } else {
                try {

                    $getPermissionName = $ability;
                    $checkUserAbility = $this->userCanPermissionAccess( $getPermissionName );
                    return $checkUserAbility;

                } catch (\Exception $e){
                    self::customSessionMessage(1, "Error", " INVALID PERMISSION");
                    return false;
                }
            }

            self::customSessionMessage(1, "Error", " INVALID PERMISSION");
            return false;


        });
        //
    }
}
