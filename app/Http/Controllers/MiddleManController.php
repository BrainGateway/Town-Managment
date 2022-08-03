<?php

namespace App\Http\Controllers;

use App\Models\MiddleMan;
use App\Http\Requests\StoreMiddleManRequest;
use App\Http\Requests\UpdateMiddleManRequest;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMiddleManRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMiddleManRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MiddleMan  $middleMan
     * @return \Illuminate\Http\Response
     */
    public function show(MiddleMan $middleMan)
    {
        //
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
