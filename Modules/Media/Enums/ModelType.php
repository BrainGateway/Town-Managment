<?php


namespace Modules\Media\Enums;


class ModelType
{
    const PRODUCT = 'product';

    /**
     * @return int[]
     */
    public static function getModelTypeList()
    {
        return [self::PRODUCT];
    }

}
