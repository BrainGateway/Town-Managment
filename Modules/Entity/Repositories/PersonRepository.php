<?php

namespace Modules\Entity\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Entity\Proxies\Entities\Person;

class PersonRepository extends BaseRepository
{
       /**
        * @return string
        */
       public function model()
       {
          return Person::class;
       }
}
