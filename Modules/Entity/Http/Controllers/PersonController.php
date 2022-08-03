<?php

namespace Modules\Entity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Entity\Http\Requests\PersonRequest;
use Modules\Entity\Proxies\Repositories\PersonRepository;
use Modules\Entity\Transformers\PersonResource;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return PersonResource::collection(PersonRepository::filter());
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
    public function store(PersonRequest $request)
    {
        $person = PersonRepository::create($request->all());

        return new PersonResource($person);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return new PersonResource(PersonRepository::findorFail($id));
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
    public function update(PersonRequest $request, $id)
    {
        $person = PersonRepository::findorFail($id);
        $person->update($request->all());

        return $this->show($person->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $person = PersonRepository::findorFail($id);
        $person->delete();

        return \response()->json(['success'=>'person is now deleted'],200);
    }
}
