<?php

namespace Modules\Entity\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Entity\Proxies\Entities\State;

class StateRepository extends BaseRepository
{
       /**
        * @return string
        */
       public function model()
       {
          return State::class;
       }
}
