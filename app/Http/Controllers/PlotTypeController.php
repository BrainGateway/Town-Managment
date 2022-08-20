<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlotType;
use App\Http\Requests\StorePlotTypeRequest;
use App\Http\Requests\UpdatePlotTypeRequest;
use App\Http\Resources\PlotTypeResource;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class PlotTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if ($request->is('api/*')) {
                return PlotTypeResource::collection(PlotType::all());
            } else {
                if ($request->ajax()) {
                    $PlotType = PlotType::indexPlotType();
                    $PlotTypeDatatable =  !empty($PlotType) ? $PlotType : [];
                    return $PlotTypeDatatable;
                }
                return view('plot-type.index');
            }
            
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status' => 'error' , 'message' => $th->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plot-type.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlotTypeRequest $request)
    {
        try {
            $data                  = Arr::only($request->validated(),['name', 'town_id']);
            
            $plotType = PlotType::createPlotType($data);
            if ($request->is('api/*')) {
                return $this->show($plotType->id);
            }else{
                return redirect()->route('plot-type.index');
            }
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status' => 'error' , 'message' => $th->getTraceAsString()]);   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PLotTypeResource(PLotType::findOrFail($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plotType = PLotType::findOrFail($id);
        return view('plot-type.edit', compact('plotType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePLotTypeRequest $request, $id)
    {
        try{   
            $plotType         = PLotType::find($id);
            $data          = Arr::only($request->validated(), ['name','town_id']);
           
            PLotType::updatePlotType($id , $data);
            if ($request->is('api/*')) {
                return $this->show($id);
            } else {
                return redirect()->route('plot-type.index');
            }
        } catch(\Throwable $th){
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status' => 'error' , 'message'=>$th->getMessage() ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            PlotType::destroyPlotType($id);
            return response()->json(['status'=>'success' , 'message' => 'Requested plot type is deleted successfully']);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(["message" => 'error', 'message' => $th->getMessage()]);
        }
    }
}
