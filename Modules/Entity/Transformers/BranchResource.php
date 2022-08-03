<?php

namespace Modules\Entity\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Entity\Entities\Address;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        /*return [
            'id' => $this->id,
            'name' => $this->name,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'company_id' =>
        ];*/
        $parent = parent::toArray($request);
        $parent['address'] =  new AddressResource($this->whenLoaded('address'));

        return $parent;
    }
}
