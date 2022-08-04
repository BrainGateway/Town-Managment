<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Media\Http\Requests\MediaRequest;
use Modules\Media\Proxies\Entities\WhfMedia;
use Modules\Media\Proxies\Repositories\WhfMediaRepository;
use Modules\Media\Transformers\MediaResource;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('media::index');
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(MediaRequest $request)
    {
        $media = WhfMediaRepository::create($request->all());
        return $this->show($media->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $media = WhfMediaRepository::getMedia($id);
        return new MediaResource($media);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        WhfMediaRepository::delete($id);
        return response()->json(['message' => 'Requested media has been deleted successfully'], 200);
    }
}