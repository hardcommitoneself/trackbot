<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetRequest;
use App\Http\Requests\UpdateMeetRequest;
use App\Http\Resources\MeetResource;
use App\Models\Meet;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MeetController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeetResource::collection(
            QueryBuilder::for(Meet::class)
                ->allowedFilters([
                    'name',
                    AllowedFilter::exact('sport'),
                    AllowedFilter::exact('is_sanctioned'),
                    AllowedFilter::exact('is_indoor'),
                ])
                ->allowedSorts(['name'])
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
     * @param  \App\Http\Requests\StoreMeetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
        return MeetResource::make($meet);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function edit(Meet $meet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\UpdateMeetRequest  $request
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetRequest $request, Meet $meet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meet $meet)
    {
        //
    }
}
