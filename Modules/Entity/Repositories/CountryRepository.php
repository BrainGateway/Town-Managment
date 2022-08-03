<?php

namespace Modules\Entity\Repositories;

use Illuminate\Container\Container as Application;
use Modules\Base\Repositories\BaseRepository;
use Modules\Entity\Proxies\Entities\Country;

class CountryRepository extends BaseRepository
{
       /**
        * @return string
        */
       public function model()
       {
          return Country::class;
       }
}
