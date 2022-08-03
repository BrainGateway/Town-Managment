<?php

namespace Modules\Entity\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;

class Person extends Model
{
    use FilterCriteria;

    protected $table = 'persons';
    protected $fillable = ['title','first_name','middle_name','last_name','email','gender_id','phone1','phone2'];
}
