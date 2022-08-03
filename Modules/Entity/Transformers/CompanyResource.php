<?php

namespace Modules\Entity\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'address' => new AddressResource($this->whenLoaded('address')),
            'branch' =>  BranchResource::collection($this->whenLoaded('branch')),
        ];
    }
}
