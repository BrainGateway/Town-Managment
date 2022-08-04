<?php

namespace App\Http\Controllers;

use App\Models\PlotSize;
use App\Http\Requests\StorePlotSizeRequest;
use App\Http\Requests\UpdatePlotSizeRequest;

class PlotSizeController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlotSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotSizeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function show(PlotSize $plotSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotSize $plotSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotSizeRequest  $request
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlotSizeRequest $request, PlotSize $plotSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotSize $plotSize)
    {
        //
    }
}
