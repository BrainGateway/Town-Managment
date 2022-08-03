<?php

namespace Modules\Entity\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;

class Company extends Model
{
    use FilterCriteria;

    protected $fillable = ['name','phone1','phone2'];

    public function address()
    {
        return $this->morphOne(Address::class,'model');
    }

    public function branch()
    {
        return $this->hasMany(Branch::class);
    }
}
