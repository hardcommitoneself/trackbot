<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetEventRequest;
use App\Http\Requests\UpdateMeetEventRequest;
use App\Models\MeetEvent;

class MeetEventController extends Controller
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
     * @param  \App\Http\Requests\StoreMeetEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetEvent  $meetEvent
     * @return \Illuminate\Http\Response
     */
    public function show(MeetEvent $meetEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetEvent  $meetEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetEvent $meetEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMeetEventRequest  $request
     * @param  \App\Models\MeetEvent  $meetEvent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetEventRequest $request, MeetEvent $meetEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetEvent  $meetEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetEvent $meetEvent)
    {
        //
    }
}
