<?php

use App\Models\venue;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\getJson;

it('should return 404 if a venue is not found', function () {
    getJson(route('venues.show', ['venue' => 'not-exists']))
        ->assertStatus(Response::HTTP_NOT_FOUND);
});

it('should return 400 if attempting to filter by unsupported field', function () {
    getJson(route('venues.index', ['filter[not-exists]' => 'not-exists']))
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('it can get a single venue', function () {
    $venue = Venue::factory()->create([
        'name' => 'Skyhawk Stadium',
    ]);

    $venueResponse = getJson(route('venues.show', compact('venue')))
        ->json('data');

    expect($venueResponse)
        ->id->toBe($venue->uuid)
        ->attributes->name->toBe('Skyhawk Stadium');
});

it('should return all venues', function () {
    Venue::factory()->sequence(
        ['name' => 'Skyhawk Stadium'],
        ['name' => 'Don Stadium']
    )
        ->count(2)
        ->create();

    $venueResponse = getJson(route('venues.index'))
        ->json('data');

    expect($venueResponse)->sequence(
        fn($venue) => $venue->attributes->name->toBe('Skyhawk Stadium'),
        fn($venue) => $venue->attributes->name->toBe('Don Stadium'),
    );
});

it('should sort venues based on name descending', function () {
    Venue::factory()->sequence(
        ['name' => 'Skyhawk Stadium'],
        ['name' => 'Don Stadium']
    )
        ->count(2)
        ->create();

    $venueResponse = getJson(route('venues.index', ['sort' => '-name']))
        ->json('data');

    expect($venueResponse)->sequence(
        fn($venue) => $venue->attributes->name->toBe('Skyhawk Stadium'),
        fn($venue) => $venue->attributes->name->toBe('Don Stadium'),
    );
});

it('should filter venues based on name', function () {
    Venue::factory()->sequence(
        ['name' => 'Skyhawk Stadium'],
        ['name' => 'Don Stadium'],
        ['name' => 'XC venue']
    )
        ->count(3)
        ->create();

    $venueResponse = getJson(route('venues.index', ['filter[name]' => 'XC']))
        ->json('data');

    expect($venueResponse)->sequence(
        fn($venue) => $venue->attributes->name->toBe('XC venue'),
    );
});

it('should filter venues based on surface material', function () {
    Venue::factory()->sequence(
        ['name' => 'Skyhawk Stadium', 'surface_material' => 'RUBBER'],
        ['name' => 'Don Stadium', 'surface_material' => 'RUBBER'],
        ['name' => 'XC venue', 'surface_material' => 'GRASS']
    )
        ->count(3)
        ->create();

    $venueResponse = getJson(route('venues.index', ['filter[surface_material]' => 'RUBBER']))
        ->json('data');

    expect($venueResponse)->sequence(
        fn($venue) => $venue->attributes->name->toBe('Skyhawk Stadium'),
        fn($venue) => $venue->attributes->name->toBe('Don Stadium'),
    );

    $venueResponse = getJson(route('venues.index', ['filter[surface_material]' => 'GRASS']))
        ->json('data');

    expect($venueResponse)->sequence(
        fn($venue) => $venue->attributes->name->toBe('XC venue'),
    );
});
