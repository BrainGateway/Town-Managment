<?php

namespace App\Http\Controllers;

use App\Models\PlotInstallement;
use App\Http\Requests\StorePlotInstallementRequest;
use App\Http\Requests\UpdatePlotInstallementRequest;
use App\Http\Resources\PlotInstallementResource;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PlotInstallementController extends Controller
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
                return PlotInstallementResource::collection(PlotInstallement::all());
            }else{
                if ($request->ajax()) {
                    $plotInstallement =  PlotInstallement::indexPlotInstallement();
                    $plotInstallementDatatable = !empty($plotInstallement) ? $plotInstallement : [];
                    return $plotInstallementDatatable;
                }
                return view('plot-installment.index');
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
        return view('plot-installment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlotInstallementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotInstallementRequest $request)
    {
        // dd($request);

        try{
            $data               = Arr::only($request->validated(), ['payment_type','deposit_amount','slip_number','auto_slip_number','payment_method','deposit_slip','town_id','number_of_plot','owner_plot']);
            $plotInstallement   = PlotInstallement::createPlotInstallement($data);

            if ($request->is('api/*')) {
                return $this->show($plotInstallement->id);
            }else{
                return redirect()->route('installments.index');
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
     * @param  \App\Models\PlotInstallement  $plotInstallement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PlotInstallementResource(PlotInstallement::findOrFail($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotInstallement  $plotInstallement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plotInstallement      = PlotInstallement::findOrFail($id);
        // dd($plotInstallement);
        return view('plot-installment.edit', compact('plotInstallement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotInstallementRequest  $request
     * @param  \App\Models\PlotInstallement  $plotInstallement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlotInstallementRequest $request, $id)
    {
        try{
            $plotInstallement               = plotInstallement::findOrFail($id);
            $data                           = Arr::only($request->validated(), ['payment_type','deposit_amount','slip_number','auto_slip_number','payment_method','deposit_slip','town_id','number_of_plot','owner_plot']);

            plotInstallement::updatePlotInstallement($id, $data);
            if ($request->is('api/*')) {

                return $this->show($id);
            }else{
                return redirect()->route('plot-installment.index');
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
     * @param  \App\Models\PlotInstallement  $plotInstallement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            PlotInstallement::destroyPlotInstallement($id);
            return response()->json(['message' => 'Requested Plot Installement is deleted successfully']);
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }
}
