<?php

namespace Modules\Entity\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Traits\FilterCriteria;
use Modules\Entity\Proxies\Entities\State;

class City extends Model
{
    use FilterCriteria;
    protected $fillable = [];

    protected $searchAble = [
        'state_id'  => 'fixed',
        'name'      => 'free',
        'state' => [
            'name'  => 'free'
        ]
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
