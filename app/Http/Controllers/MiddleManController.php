<?php

namespace App\Http\Controllers;

use App\Models\MiddleMan;
use App\Http\Requests\StoreMiddleManRequest;
use App\Http\Requests\UpdateMiddleManRequest;
use App\Http\Resources\MiddleManResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class MiddleManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mmd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMiddleManRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMiddleManRequest $request)
    {
        try {
            $data  = Arr::only($request->validated(), ['name', 'address', 'phoneNumber', 'cnic' , 'town_id']);

            if ($request->hasFile('picture')) {
                $pic      = time().'-picture'.$request->picture->getClientOriginalExtension();
                $data['picture'] = $pic;
                $request->picture->move(public_path('mmd'), $pic);
            }else{
                $data['picture'] = time().'-picture.';
            }

            $mmd   = MiddleMan::createMmd($data);

            if ($request->is('api/*')) {
                return $this->show($mmd->id);
            }else{
                return redirect()->route('mmd.index');
            }
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MiddleMan  $middleMan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new MiddleManResource(MiddleMan::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MiddleMan  $middleMan
     * @return \Illuminate\Http\Response
     */
    public function edit(MiddleMan $middleMan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMiddleManRequest  $request
     * @param  \App\Models\MiddleMan  $middleMan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMiddleManRequest $request, MiddleMan $middleMan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MiddleMan  $middleMan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MiddleMan $middleMan)
    {
        //
    }
}
