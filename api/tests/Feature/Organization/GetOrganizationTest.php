<?php

use App\Models\Organization;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\getJson;

it('should return 404 if a organization is not found', function () {
    getJson(route('organizations.show', ['organization' => 'not-exists']))
        ->assertStatus(Response::HTTP_NOT_FOUND);
});

it('should return 400 if attempting to filter by unsupported field', function () {
    getJson(route('organizations.index', ['filter[not-exists]' => 'not-exists']))
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('it can get a single organization', function () {
    $organization = Organization::factory()->create([
        'name' => 'Salem Hills HS',
    ]);

    $meetResponse = getJson(route('organizations.show', compact('organization')))
        ->json('data');

    expect($meetResponse)
        ->id->toBe($organization->uuid)
        ->attributes->name->toBe('Salem Hills HS');
});
