<?php

namespace Modules\Entity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Entity\Http\Requests\BranchRequest;
use Modules\Entity\Proxies\Http\Requests\CompanyRequest;
use Modules\Entity\Proxies\Repositories\CompanyRepository;
use Modules\Entity\Transformers\BranchResource;
use Modules\Entity\Transformers\CompanyResource;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return CompanyResource::collection(CompanyRepository::with('address')->filter());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('entity::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->all();
        $company = CompanyRepository::create($request->all());
        $company->address()->create( $data['address'] );

        return $this->show($company->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
       return new CompanyResource(CompanyRepository::with('address')->findorFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('entity::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $data = $request->all();
        $company = CompanyRepository::findorFail($id);
        $address = $company->address()->first();

        $company->update( $data );

        if ( $address ) {
            $address->update( $data['address'] );
        } else {
            $company->address()->create( $data['address'] );
        }

        return $this->show($company->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $company = CompanyRepository::findorFail($id);
        $company->address()->delete();
        $company->delete();

        return \response()->json(['success'=>'company is deleted now'],200);
    }

    /**
     * @param $id
     * get all branches of a company
     */
    public function getBranches($id)
    {
       $company = CompanyRepository::with('address','branch')->findorFail($id);

       return new CompanyResource($company);
    }

    public function storeBranch(BranchRequest $request,$id)
    {
        $company = CompanyRepository::findorFail($id);
        $branch = $company->branch()->create($request->all());
        $branch->address()->create($request->all());

        return new CompanyResource($company);
    }

    /**
     * get company branch by ids
     * @param $companyId
     * @param $branchId
     * @return CompanyResource
     */
    public function getCompanyBranch($companyId,$branchId)
    {
        $companyBranch = CompanyRepository::getCompanyBranchByIds($companyId,$branchId);

        return new CompanyResource($companyBranch);
    }

    /**
     * @param Request $request
     * @param $companyId
     * @param $branchId
     * @return Response|CompanyResource
     */
    public function updateCompanyBranch(BranchResource $request,$companyId,$branchId)
    {
        $company = CompanyRepository::findorFail($companyId);
        $branch = $company->branch()->where('branches.id',$branchId)->first();
        $address = $branch->address()->first();
        $address->update($request->all());
        $branch->update($request->all());

        return $this->getCompanyBranch($company->id,$branchId);
    }

    /**
     * @param $companyId
     * @param $branchId
     */
    public function deleteCompanyBranch($companyId,$branchId)
    {
        $company = CompanyRepository::findorFail($companyId);
        $company->branch()->where('branches.id',$branchId)->delete();

        return \response()->json(['success'=>'company is deleted now'],200);
    }
}
