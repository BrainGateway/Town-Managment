<?php

namespace Modules\Entity\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;

class Branch extends Model
{
    use FilterCriteria;

    protected $fillable = ['name','phone1','phone2','company_id'];
    public $timestamps = false;

    public function address()
    {
        return $this->morphOne(Address::class,'model');
    }
}
