<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection(
            QueryBuilder::for(Event::class)
                ->allowedFilters([
                    AllowedFilter::exact('constant'),
                    AllowedFilter::exact('sport'),
                    AllowedFilter::exact('gender'),
                    AllowedFilter::exact('mark_type'),
                    AllowedFilter::exact('is_relay'),
                    AllowedFilter::exact('is_field'),
                    AllowedFilter::exact('is_track'),
                    AllowedFilter::exact('is_hurdles'),
                    AllowedFilter::exact('is_distance'),
                    AllowedFilter::exact('is_sprint'),
                    AllowedFilter::exact('is_jump'),
                    AllowedFilter::exact('is_throw'),
                    AllowedFilter::exact('is_multi'),
                    AllowedFilter::exact('has_wind'),
                ])
                ->allowedSorts(['sort', 'sport', 'gender'])
                ->get()
        );
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
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return EventResource::make($event);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
