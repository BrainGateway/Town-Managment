<?php

namespace Modules\Notifier\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;

class Notification extends Model
{
    use FilterCriteria;

    protected $fillable = ['hook','slug','target','lang'];

    public function emailNotification()
    {
        return $this->hasOne(EmailNotification::class);
    }
}
