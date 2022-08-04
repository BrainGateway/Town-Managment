<?php

namespace Modules\Notifier\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;

class PushNotification extends Model
{
    use FilterCriteria;

    protected $fillable = ['subject','body','notification_id'];

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
}
