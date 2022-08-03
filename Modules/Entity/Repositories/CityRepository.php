<?php

namespace Modules\Entity\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Entity\Proxies\Entities\City;

class CityRepository extends BaseRepository
{
       /**
        * @return string
        */
       public function model()
       {
          return City::class;
       }
}
