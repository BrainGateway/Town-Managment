<?php

namespace App\Http\Controllers;

use App\Models\PlotUser;
use App\Http\Requests\StorePlotUserRequest;
use App\Http\Requests\UpdatePlotUserRequest;

class PlotUserController extends Controller
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
     * @param  \App\Http\Requests\StorePlotUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotUser  $plotUser
     * @return \Illuminate\Http\Response
     */
    public function show(PlotUser $plotUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotUser  $plotUser
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotUser $plotUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotUserRequest  $request
     * @param  \App\Models\PlotUser  $plotUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlotUserRequest $request, PlotUser $plotUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotUser  $plotUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotUser $plotUser)
    {
        //
    }
}
