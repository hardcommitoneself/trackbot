<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetEventRoundRequest;
use App\Http\Requests\UpdateMeetEventRoundRequest;
use App\Http\Resources\MeetEventRoundResource;
use App\Models\MeetEventRound;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MeetEventRoundController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeetEventRoundResource::collection(
            QueryBuilder::for(MeetEventRound::class)
                ->allowedFilters([
                    AllowedFilter::exact('round'),
                ])
                ->allowedSorts(['round'])
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
     * @param  \App\Http\Requests\StoreMeetEventRoundRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetEventRoundRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\MeetEventRound  $meetEventRound
     * @return \Illuminate\Http\Response
     */
    public function show(MeetEventRound $meetEventRound)
    {
        return MeetEventRoundResource::make($meetEventRound);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\MeetEventRound  $meetEventRound
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetEventRound $meetEventRound)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\UpdateMeetEventRoundRequest  $request
     * @param  \App\Models\MeetEventRound  $meetEventRound
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetEventRoundRequest $request, MeetEventRound $meetEventRound)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\MeetEventRound  $meetEventRound
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetEventRound $meetEventRound)
    {
        //
    }
}
