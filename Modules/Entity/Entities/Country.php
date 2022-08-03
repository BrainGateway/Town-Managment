<?php

namespace Modules\Entity\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;

class Country extends Model
{
    use FilterCriteria;
    protected $fillable = ['name', 'code', 'status'];
    public $timestamps = false;

    protected $casts = [
        'status'    =>  'boolean'
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
