<?php

namespace Modules\Notifier\Repositories;

use Illuminate\Container\Container as Application;
use Modules\Base\Repositories\BaseRepository;
use Modules\Notifier\Entities\PushNotification;

class PushNotificationRepository extends BaseRepository
{
       /**
        * @return string
        */
       public function model()
       {
          return PushNotification::class;
       }
}
