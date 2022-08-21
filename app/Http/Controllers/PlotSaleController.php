<?php

namespace App\Http\Controllers;

use App\Models\PlotSale;
use App\Http\Requests\StorePlotSaleRequest;
use App\Http\Requests\UpdatePlotSaleRequest;
use App\Http\Resources\PlotSaleResource;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PlotSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->is('api/*')) {
                return PlotSaleResource::collection(PlotSale::all());
            }else {
                if ($request->ajax()) {
                    $plotSale = PlotSale::indexPlotSale();
                    $plotSalesDatatable = ($plotSale) ? $plotSale : [] ;
                    return $plotSalesDatatable;
                }
                return view('plot-sale.index');
            }
        } catch (\Throwable $th) {
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
        return view('plot-sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlotSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotSaleRequest $request)
    {
        try {
            $data = Arr::only($request->validated() , ['plot_number','size','dimension','form_number','plot_price','discount','registration_charges','deal_price','installments','deal_validity','sale_man','mmd','register_only','town_id','block_id','owner_plot','nominee_owner_plot' ]);
            $plotSale = PlotSale::createPloteSale($data);
            if ($request->is('api/*')) {
                return $this->show($plotSale->id);
            } else {
                return redirect()->route('plot-sale.index');
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
     * @param  \App\Models\PlotSale  $plotSale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PlotSaleResource(PlotSale::findOrFail($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotSale  $plotSale
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotSale $plotSale)
    {
        $plotSale = PlotSale::findOrFail($id);
        return view('plot-sale.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotSaleRequest  $request
     * @param  \App\Models\PlotSale  $plotSale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlotSaleRequest $request, $id)
    {
        try{
            $plotSale               = PlotSale::findOrFail($id);
            $data                   = Arr::only($request->validated(), ['plot_number','size','dimension','form_number','plot_price','discount','registration_charges','deal_price','installments','deal_validity','sale_man','mmd','register_only','town_id','block_id','owner_plot','nominee_owner_plot' ]);
            
            PlotSale::updatePlotSale($id, $data);

            if ($request->is('api/*')) {

                return $this->show($id);
            }else{
                return redirect()->route('plot-sale.index');
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
     * @param  \App\Models\PlotSale  $plotSale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            PlotSale::destroyPlotSale($id);
            return response()->json(['message' => 'Requested Plot Sale is deleted successfully']);
        } catch(\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status'=>'error', 'message'=>$th->getMessage()]);
        }
    }
}
