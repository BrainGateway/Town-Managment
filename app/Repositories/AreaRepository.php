<?php


namespace App\Repositories;


use App\Models\Area;
use App\ClassModel;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;

class AreaRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Area::class;
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
            $townData = Arr::only($data, ['area_name','description', 'status', 'branch_id', 'location_id']);
            $area     = $this->create($townData);
            return $town;
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
        return DB::transaction(function () use ($data, $id)
        {
            $town = $this->findOrFail($id);
            $townData   = Arr::only($data, ['area_name','description', 'status', 'branch_id', 'location_id']);
            $town->update($townData);
            return $town;
        });
    }


}
