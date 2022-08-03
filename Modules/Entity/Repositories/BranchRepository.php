<?php

namespace Modules\Entity\Repositories;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\Base\Repositories\BaseRepository;
use Modules\Entity\Proxies\Entities\Branch;

class BranchRepository extends BaseRepository
{
    public function model()
    {
        return Branch::class;
    }

    /**
     * @param $query
     * @param $data
     */
    public function fetchCreate($query, $data)
    {
        return DB::transaction(function() use ($data)
        {
            $branch = $this->create(Arr::only($data, ['name', 'phone1', 'phone2', 'company_id']));
            $branch->address()->create($data['address']);
            return $branch;
        });
    }

    /**
     * @param $query
     * @param $data
     * @param $id
     * @return mixed
     */
    public function fetchUpdate($query, $data, $id)
    {
        return DB::transaction(function() use ($data, $id)
        {
            $branch = $this->findorFail($id);
            $branch->update($data);

            if($address = $branch->address()->first())
            {
                $address->update($data['address']);
            }

            return $branch;
        });
    }
}
