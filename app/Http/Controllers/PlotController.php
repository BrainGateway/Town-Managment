<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use App\Http\Requests\StorePlotRequest;
use App\Http\Requests\UpdatePlotRequest;
use App\Http\Resources\PlotResource;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PlotController extends Controller
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
                return PlotResource::collection(Plot::all());
            }else{
                if ($request->ajax()) {
                    $plots =  Plot::indexTown();
                    $plotsDatatable = !empty($plots) ? $plots : [];
                    return $plotsDatatable;
                 }
                return view('plot.index');
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
        return view('plot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotRequest $request)
    {
        try{


            $data               = Arr::only($request->validated(), ['plot_number', 'plot_type', 'size', 'dimension' , 'town_id']);
            $plot   = Plot::createplot($data);

            if ($request->is('api/*')) {
                return $this->show($plot->id);
            }else{
                return redirect()->route('plot.index');
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
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PlotResource(Plot::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plot      = Plot::findOrFail($id);
        return view('plot.edit', compact('plot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotRequest  $request
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlotRequest $request, $id)
    {
        try{
            $plot               = Plot::findOrFail($id);
            $data               = Arr::only($request->validated(), ['plot_number', 'plot_type', 'size', 'dimension' , 'town_id']);
            
            Plot::updatePlot($id, $data);

            if ($request->is('api/*')) {

                return $this->show($id);
            }else{
                return redirect()->route('plot.index');
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
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Plot::destroyPlot($id);
            return response()->json(['message' => 'Requested Plot is deleted successfully']);
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }
}
