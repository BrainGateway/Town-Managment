<?php

namespace Modules\Entity\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;

class Address extends Model
{
    use FilterCriteria;

    protected $fillable = [ 'addr1','addr2','city','state','zip_code','country','lat','lng'];

}
