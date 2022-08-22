<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlotSaleResource extends JsonResource
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
            'id'                         =>$this->id,
            'plot_number'                =>$this->plot_number,
            'size'                       =>$this->size,
            'dimension'                  =>$this->dimension,
            'form_number'                =>$this->form_number,
            'plot_price'                 =>$this->plot_price,
            'discount'                   =>$this->discount,
            'registration_charges'       =>$this->registration_charges,
            'deal_price'                 =>$this->deal_price,
            'installments'               =>$this->installments,
            'deal_validity'              =>$this->deal_validity,
            'sale_man'                   =>$this->sale_man,
            'mmd'                        =>$this->mmd,
            'register_only'              =>$this->register_only,
            'town_id'                    =>$this->town_id,
            'block_id'                   =>$this->block_id,
            'owner_plot'                 =>$this->owner_plot,
            'nominee_owner_plot'         =>$this->nominee_owner_plot,
        ];
    }
}


        