<?php

namespace Modules\Notifier\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;

class EmailNotification extends Model
{
    use FilterCriteria;

    protected $fillable = ['subject','html_body','text_body','notification_id'];

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
}
