<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TownResource extends JsonResource
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
            'NumOfPlots'                 => $this->NumOfPlots,
            'logo'                      => asset("town/".$this->logo),
        ];
    }
}
