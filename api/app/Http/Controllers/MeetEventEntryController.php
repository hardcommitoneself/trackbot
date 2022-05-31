<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetEventEntryRequest;
use App\Http\Requests\UpdateMeetEventEntryRequest;
use App\Models\MeetEventEntry;

class MeetEventEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreMeetEventEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetEventEntryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\MeetEventEntry  $meetEventEntry
     * @return \Illuminate\Http\Response
     */
    public function show(MeetEventEntry $meetEventEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\MeetEventEntry  $meetEventEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetEventEntry $meetEventEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\UpdateMeetEventEntryRequest  $request
     * @param  \App\Models\MeetEventEntry  $meetEventEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetEventEntryRequest $request, MeetEventEntry $meetEventEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\MeetEventEntry  $meetEventEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetEventEntry $meetEventEntry)
    {
        //
    }
}
