<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrgRequest;
use App\Http\Requests\UpdateOrgRequest;
use App\Http\Resources\MeetResource;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Spatie\QueryBuilder\QueryBuilder;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeetResource::collection(
            QueryBuilder::for(Organization::class)
                ->allowedFilters(['name'])
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
     * @param  \App\Http\Requests\StoreOrgRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrgRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return OrganizationResource::make($organization);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Organization  $org
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $org)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\UpdateOrgRequest  $request
     * @param  \App\Models\Organization  $org
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrgRequest $request, Organization $org)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Organization  $org
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $org)
    {
        //
    }
}
