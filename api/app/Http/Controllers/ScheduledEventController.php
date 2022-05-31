<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduledEventRequest;
use App\Http\Requests\UpdateScheduledEventRequest;
use App\Models\ScheduledEvent;

class ScheduledEventController extends Controller
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
     * @param  \App\Http\Requests\StoreScheduledEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduledEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScheduledEvent  $scheduledEvent
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduledEvent $scheduledEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduledEvent  $scheduledEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduledEvent $scheduledEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScheduledEventRequest  $request
     * @param  \App\Models\ScheduledEvent  $scheduledEvent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduledEventRequest $request, ScheduledEvent $scheduledEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduledEvent  $scheduledEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduledEvent $scheduledEvent)
    {
        //
    }
}
