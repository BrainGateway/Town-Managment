<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\PlotSize;
use App\Http\Requests\StorePlotSizeRequest;
use App\Http\Requests\UpdatePlotSizeRequest;
use App\Http\Resources\PlotSizeResource;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class PlotSizeController extends Controller
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
                return PlotSizeResource::collection(PlotSize::all());
            }else{
                if ($request->ajax()) {
                    $plotSize =  Plot::indexTown();
                    $plotSizeDatatable = !empty($plotSize) ? $plotSize : [];
                    return $plotSizeDatatable;
                 }
                return view('plotSize.index');
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
        return view('plotSize.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlotSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotSizeRequest $request)
    {
        try{
            $data               = Arr::only($request->validated(), ['size', 'dimension' , 'town_id']);
            $plotSize   = PlotSize::createPlotSize($data);

            if ($request->is('api/*')) {
                return $this->show($plotSize->id);
            }else{
                return redirect()->route('plotSize.index');
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
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PlotSizeResource(PlotSize::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plotSize      = PlotSize::findOrFail($id);
        return view('plotSize.edit', compact('plotSize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotSizeRequest  $request
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlotSizeRequest $request, $id)
    {
        try{
            $plotSize               = plotSize::findOrFail($id);
            $data               = Arr::only($request->validated(), ['size', 'dimension' , 'town_id']);
            
            plotSize::updatePlotSize($id, $data);
            if ($request->is('api/*')) {

                return $this->show($id);
            }else{
                return redirect()->route('plotSize.index');
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
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function destroyPlotSize($id)
    {
        try{
            PlotSize::destroyPlotSize($id);
            return response()->json(['message' => 'Requested PlotSize is deleted successfully']);
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }
}
