<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetEntryRequest;
use App\Http\Requests\UpdateMeetEntryRequest;
use App\Models\MeetEntry;

class MeetEntryController extends Controller
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
     * @param  \App\Http\Requests\StoreMeetEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetEntryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetEntry  $meetEntry
     * @return \Illuminate\Http\Response
     */
    public function show(MeetEntry $meetEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetEntry  $meetEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetEntry $meetEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMeetEntryRequest  $request
     * @param  \App\Models\MeetEntry  $meetEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetEntryRequest $request, MeetEntry $meetEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetEntry  $meetEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetEntry $meetEntry)
    {
        //
    }
}
