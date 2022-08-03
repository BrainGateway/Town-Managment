<?php

namespace Modules\Entity\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Entity\Proxies\Entities\Company;

class CompanyRepository extends BaseRepository
{
    public function model()
    {
        return Company::class;
    }

    public function fetchGetCompanyBranchByIds($query,$companyId,$branchId)
    {

        $companyBranch = $query::findorfail($companyId)->with(['address','branch.address','branch'=> function($query) use ($branchId){
            return $query->where('branches.id','=',$branchId);
        }]);

        return $companyBranch->wherehas('branch',function($query) use ($branchId) {
            return $query->where('branches.id', '=', $branchId);
        })->first();
    }
}
