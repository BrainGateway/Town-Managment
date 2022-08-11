<?php

namespace App\Http\Controllers;

use App\Models\Town;
use App\Http\Requests\StoreTownRequest;
use App\Http\Requests\UpdateTownRequest;
use App\Http\Resources\TownResource;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TownController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            if ($request->is('api/*')) {
                return TownResource::collection(Town::all());
            }else{
                if ($request->ajax()) {
                    $towns =  Town::indexTown();
                    $townsDatatable = !empty($towns) ? $towns : [];
                    return $townsDatatable;
                 }
                return view('towns.index');
            }
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('towns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTownRequest $request)
    {

        try{
            $data               = Arr::only($request->validated(), ['name', 'address', 'phoneNumber', 'NumOfPlots']);
       
            if($request->hasFile('logo'))
            {
                $logo               = time().'-logo.'.$request->logo->getClientOriginalExtension();
                $data['logo']       = $logo;
                // $request->icon->move("assets/images", $logo);
            }
            else {
                $data['logo']       = time().'-logo.';
            }

            $town   = Town::createTown($data);

            if ($request->is('api/*')) {
                return $this->show($town->id);
            }else{
                return redirect()->route('towns.index');
            }
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TownResource(Town::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $town      = Town::findOrFail($id);
        return view('towns.edit', compact('town'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Town  $test
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTownRequest $request, $id){
        try{
            $town               = Town::findOrFail($id);
            $data               = Arr::only($request->validated(), ['name', 'address', 'phoneNumber', 'NumOfPlots']);
            $logo               = time().'-logo.'.$request->logo->getClientOriginalExtension();

            if($request->hasFile('logo'))
            {
                if(File::exists(asset("assets/images/".$town->logo))){
                    unlink(asset("assets/images/".$town->logo));
                }
                $logo               = time().'-logo.'.$request->logo->getClientOriginalExtension();
                $data['logo']       = $logo;

                // $request->icon->move("assets/images", $logo);
            }

            Town::updateTown($id, $data);
            if ($request->is('api/*')) {

                return $this->show($id);
            }else{
                return redirect()->route('towns.index');
            }

        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Town  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        try{
            Town::destroyTown($id);
            return response()->json(['message' => 'Requested town is deleted successfully']);
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }


}
