<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlotInstallementResource extends JsonResource
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
        'payment_type'             =>  $this->payment_type,
        'deposit_amount'           =>  $this->deposit_amount ,
        'slip_number'              =>  $this->slip_number ,
        'auto_slip_number'         =>  $this->auto_slip_number ,
        'payment_method'           =>  $this->payment_method ,
        'deposit_slip'             =>  $this->deposit_slip ,
        'town_id'                  =>  $this->town_id ,
        'number_of_plot'           =>  $this->number_of_plot ,
        'owner_plot'               =>  $this->owner_plot ,
        ];
    }
}
