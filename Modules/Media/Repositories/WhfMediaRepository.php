<?php

namespace Modules\Media\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Support\Facades\DB;
use Modules\Base\Repositories\BaseRepository;
use Modules\Media\Enums\ModelType;
use Modules\Media\Proxies\Entities\WhfMedia;
use Modules\Product\Entities\Product;
use Modules\Product\Proxies\Repositories\ProductRepository;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WhfMediaRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return WhfMedia::class;
    }

    /**
     * @param $query
     * @param $data
     * @return mixed
     */
    public function fetchCreate($query, $data)
    {
        return DB::transaction(function() use ($data)
        {
            if($data['model_type'] == ModelType::PRODUCT)
            {
                $product = ProductRepository::findOrFail($data['model_id']);

                if(!empty($data['overwrite']) && $data['overwrite'] && ($oldMedia = $product->getFirstMedia($data['collection']))) {
                    $oldMedia->delete();
                }

                return $product->addMedia(request()->file)->toMediaCollection($data['collection']);
            }
        });
    }

    public function fetchGetMedia($query, $id)
    {
        return  Media::findOrFail($id);
    }

    public function fetchDelete($query, $id)
    {
        return Media::findOrFail($id)->delete();
    }


}
