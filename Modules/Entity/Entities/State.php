<?php

namespace Modules\Entity\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;


class State extends Model
{
    use FilterCriteria;
    protected $fillable = [];
    
    protected $searchAble = [
        'country_id'    => 'fixed',
        'name'          => 'free',
        'country' => [
            'name' => 'free'
        ]
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
