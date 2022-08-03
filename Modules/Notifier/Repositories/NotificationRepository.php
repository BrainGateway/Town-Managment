<?php

namespace Modules\Notifier\Repositories;

use Illuminate\Container\Container as Application;
use Modules\Base\Repositories\BaseRepository;
use Modules\Notifier\Entities\Notification;

class NotificationRepository extends BaseRepository
{
       /**
        * @return string
        */
       public function model()
       {
          return Notification::class;
       }
}
