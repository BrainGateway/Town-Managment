<?php


namespace Modules\UserEntity\Extend\Entities;


use Modules\UserEntity\Proxies\Entities\PersonUser;

class Person extends ProxyPerson
{
    public function personUser()
    {
        return $this->hasOne(PersonUser::class);
    }
}
