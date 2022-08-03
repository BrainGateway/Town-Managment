<?php

namespace Modules\Media\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $media =  [
            'id'        => $this->id,
            'name'      => $this->name,
            'file_name' => $this->file_name,
            'url'       => $this->getUrl(),
        ];

        if($this->hasCustomProperty('generated_conversions'))
        {
            $conversions = $this->getCustomProperty('generated_conversions');
            foreach ($conversions as $name => $exists) {
                if($exists) $media[$name] = $this->getUrl($name);
            }
        }

        return $media;
    }
}
