<?php

namespace App\Http\Controllers;

use App\Models\SaleMaster;
use App\Http\Requests\StoreSaleMasterRequest;
use App\Http\Requests\UpdateSaleMasterRequest;

class SaleMasterController extends Controller
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
     * @param  \App\Http\Requests\StoreSaleMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function show(SaleMaster $saleMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleMaster $saleMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleMasterRequest  $request
     * @param  \App\Models\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleMasterRequest $request, SaleMaster $saleMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleMaster $saleMaster)
    {
        //
    }
}
