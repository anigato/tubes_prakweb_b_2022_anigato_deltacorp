<?php

namespace App\Http\Controllers;

use App\Models\Slidder;
use App\Http\Requests\StoreSlidderRequest;
use App\Http\Requests\UpdateSlidderRequest;

class SlidderController extends Controller
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
     * @param  \App\Http\Requests\StoreSlidderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlidderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slidder  $slidder
     * @return \Illuminate\Http\Response
     */
    public function show(Slidder $slidder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slidder  $slidder
     * @return \Illuminate\Http\Response
     */
    public function edit(Slidder $slidder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSlidderRequest  $request
     * @param  \App\Models\Slidder  $slidder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlidderRequest $request, Slidder $slidder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slidder  $slidder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slidder $slidder)
    {
        //
    }
}
