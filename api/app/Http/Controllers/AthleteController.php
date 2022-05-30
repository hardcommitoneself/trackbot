<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAthleteRequest;
use App\Http\Requests\UpdateAthleteRequest;
use App\Models\Athlete;

class AthleteController extends Controller
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
     * @param  \App\Http\Requests\StoreAthleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAthleteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function show(Athlete $athlete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function edit(Athlete $athlete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAthleteRequest  $request
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAthleteRequest $request, Athlete $athlete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        //
    }
}
