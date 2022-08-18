<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MiddleManResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'name'                      => $this->name,
            'address'                => $this->address,
            'phoneNumber'               => $this->phoneNumber,
            'cnic'                 => $this->cnic,
            'town_id'                 => $this->town_id,
            'picture'                      => asset("mmd/".$this->picture),
        ];
    }
}
