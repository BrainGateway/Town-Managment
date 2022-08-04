<?php

namespace Modules\Entity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Entity\Proxies\Http\Requests\BranchRequest;
use Modules\Entity\Proxies\Repositories\BranchRepository;
use Modules\Entity\Proxies\Transformers\BranchResource;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return BranchResource::collection(BranchRepository::with('address')->filter());
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(BranchRequest $request)
    {
        $data = $request->all();
        $branch = BranchRepository::create($data);
        return $this->show($branch->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return new BranchResource(BranchRepository::with('address')->findorFail($id));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(BranchRequest $request, $id)
    {
        $branch = BranchRepository::update($request->validated(), $id);
        return $this->show($branch->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $branch = BranchRepository::findorFail($id);
        $branch->address()->delete();
        $branch->delete();

        return \response()->json(['success'=>'branch is deleted']);
    }


}
