<?php


namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Transformers\MediaResource;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Support\Str;

class WhfMedia extends Model implements HasMedia
{
    //protected $table = 'media';
    use InteractsWithMedia;

    public $registerMediaConversionsUsingModelInstance = true;

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        if(!isset($this->conversions) || !sizeof($this->conversions)) return;

        foreach ($this->conversions as $name => $conversion)
        {
            $this->addMediaConversion($name)
                ->width($conversion['width'])
                ->height($conversion['height']);
        }
    }

    /**
     *
     * @param $file
     * @param string $collection collection name
     * @return \Modules\Page\Entities\WhfMedia
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function saveMedia($file, $collection = 'default', $customProperties = [])
    {
        $media = $this->addMedia($file)
            ->withCustomProperties($customProperties)->toMediaCollection($collection);
        return $media;
    }

    public function saveMediaFromBase64($base64, $collection = 'default', $customProperties = [])
    {
        /* need to provide fileName manually as there is bug in spatie media */
        $fileName = Str::random(15) . '.' . explode('/', mime_content_type($base64))[1];
        
        $media = $this->addMediaFromBase64($base64)
            ->usingFileName($fileName)
            ->withCustomProperties($customProperties)->toMediaCollection($collection);
        return $media;
    }

    /**
     * @param $file[]
     * @param $collection
     * @return $this
     */
    public function saveMultipleMedia($file, $collection = 'default')
    {
        $this->addAllMediaFromRequest($file)->each(function ($fileAdder) use($collection) {
            $fileAdder->toMediaCollection($collection);
        });

        return $this;
    }

    /**
     * get all media files related to a model record
     * @param $collection
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function allMedia($collection = 'default')
    {
        $medias = $this->getMedia($collection);
        return MediaResource::collection($medias);
    }

    /**
     * get single/first media file related to a model record
     * @param $collection
     * @return MediaResource
     */
    public function firstMedia($collection = 'default')
    {
        $media = $this->getFirstMedia($collection);
        return new MediaResource($media);
    }

    /**
     *
     * @param string $collection
     * @return \Illuminate\Support\Collection
     */
    public function fetchMedia($collection = 'default')
    {
        $mediaItems =  $this->getMedia($collection);

        if(!$mediaItems) return [];

        $response = [];
        foreach ($mediaItems as $mediaItem)
        {
            $media['id']  = $mediaItem->id;
            $media['url'] = $mediaItem->getUrl();


            if(!empty($mediaItem->custom_properties))
                $media = array_merge($media, $mediaItem->custom_properties);

            if(isset($this->conversions)) {
                foreach ($this->conversions as $name => $conversion) {
                    if($mediaItem->hasGeneratedConversion($name)) $media[$name] = $mediaItem->getUrl($name);
                }
            }


            $response[] = $media;
        }

        //return (sizeof($response) == 1) ? $response[0] : $response ;
        return $response;
    }

    public function fetchSingleMedia($collection = 'default')
    {
        $media =  $this->getFirstMedia($collection);

        if(!$media) return [];

        $response['id']  = $media->id;
        $response['name']       = $media->name;
        $response['file_name']  = $media->file_name;
        $response['url'] = $media->getUrl();

        foreach ($this->conversions as $name => $conversion) {
            if($media->hasGeneratedConversion($name)) $response[$name] = $media->getUrl($name);
        }

        //$response[$collection] = $media;

        return [$collection => $response];
    }

    /**
     * get image thumbnail by collection and size thumbnail
     * @param string $collection
     * @param string $size
     * @return string
     */
    function getThumbnail($collection = 'default', $size = 'thumbnail_small') : string
    {
        if( ($media = $this->getMedia($collection)->first()) && $media->hasGeneratedConversion($size) )
        {
            return $media->getUrl($size);
        }

        return '';
    }

    /**
     * @param $id
     * @param string $collection
     */
    public function deleteMedia($id, $collection = 'default')
    {
        if($media = $this->getMedia($collection)->where('id', $id)->first()) {
            $media->delete();
            return true;
        }
        return false;
    }
}
