<?php

namespace Modules\Notifier\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SmsNotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
