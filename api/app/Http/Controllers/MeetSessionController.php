<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetSessionRequest;
use App\Http\Requests\UpdateMeetSessionRequest;
use App\Models\MeetSession;

class MeetSessionController extends Controller
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
     * @param  \App\Http\Requests\StoreMeetSessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetSessionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetSession  $meetSession
     * @return \Illuminate\Http\Response
     */
    public function show(MeetSession $meetSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetSession  $meetSession
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetSession $meetSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMeetSessionRequest  $request
     * @param  \App\Models\MeetSession  $meetSession
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetSessionRequest $request, MeetSession $meetSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetSession  $meetSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetSession $meetSession)
    {
        //
    }
}
