<?php


namespace Modules\UserEntity\Extend\Entities;


use Modules\UserEntity\Proxies\Entities\PersonUser;

class User extends ProxyUser
{
    public function personUser()
    {
        //return $this->belongsToMany(PersonUser::class, 'person_user', 'user_id', 'person_id');
        return $this->hasOne(PersonUser::class);
    }
}
