<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlotResource extends JsonResource
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
            'plot_number'               => $this->plot_number,
            'plot_type'                 => $this->plot_type,
            'size'                      => $this->size,
            'dimension'                 => $this->dimension,
            'town_id'                   => $this->town_id,
        ];
    }
}
