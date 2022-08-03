<?php

namespace Modules\UserEntity\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;
use Modules\Entity\Proxies\Entities\Person;
use Modules\User\Proxies\Entities\User;

class PersonUser extends Model
{
    public $timestamps  = false;
    protected $table = 'person_user';
    protected $fillable = ['person_id'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
