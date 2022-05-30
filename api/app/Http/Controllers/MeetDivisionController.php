<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetDivisionRequest;
use App\Http\Requests\UpdateMeetDivisionRequest;
use App\Http\Resources\MeetDivisionResource;
use App\Models\MeetDivision;
use Spatie\QueryBuilder\QueryBuilder;

class MeetDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeetDivisionResource::collection(
            QueryBuilder::for(MeetDivision::class)
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
     * @param  \App\Http\Requests\StoreMeetDivisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetDivisionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\MeetDivision  $meetDivision
     * @return \Illuminate\Http\Response
     */
    public function show(MeetDivision $meetDivision)
    {
        return MeetDivisionResource::make($meetDivision);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\MeetDivision  $meetDivision
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetDivision $meetDivision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\UpdateMeetDivisionRequest  $request
     * @param  \App\Models\MeetDivision  $meetDivision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetDivisionRequest $request, MeetDivision $meetDivision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\MeetDivision  $meetDivision
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetDivision $meetDivision)
    {
        //
    }
}
