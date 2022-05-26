<?php

use App\Models\Meet;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\getJson;

it('should return 404 if a meet is not found', function () {
    getJson(route('meets.show', ['meet' => 'not-exists']))
        ->assertStatus(Response::HTTP_NOT_FOUND);
});

it('should return 400 if attempting to filter by unsupported field', function () {
    getJson(route('meets.index', ['filter[not-exists]' => 'not-exists']))
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('it can get a single meet', function () {
    $meet = Meet::factory()->create([
        'name' => 'Skyhawk Invite',
    ]);

    $meetResponse = getJson(route('meets.show', compact('meet')))
        ->json('data');

    expect($meetResponse)
        ->id->toBe($meet->uuid)
        ->attributes->name->toBe('Skyhawk Invite');
});

it('should return all meets', function () {
    Meet::factory()->sequence(
        ['name' => 'Skyhawk Invite'],
        ['name' => 'Utah County Invitational']
    )
        ->count(2)
        ->create();

    $meetResponse = getJson(route('meets.index'))
        ->json('data');

    expect($meetResponse)->sequence(
        fn($meet) => $meet->attributes->name->toBe('Skyhawk Invite'),
        fn($meet) => $meet->attributes->name->toBe('Utah County Invitational'),
    );
});

it('should sort meets based on name descending', function () {
    Meet::factory()->sequence(
        ['name' => 'Skyhawk Invite'],
        ['name' => 'Utah County Invitational']
    )
        ->count(2)
        ->create();

    $meetResponse = getJson(route('meets.index', ['sort' => '-name']))
        ->json('data');

    expect($meetResponse)->sequence(
        fn($meet) => $meet->attributes->name->toBe('Utah County Invitational'),
        fn($meet) => $meet->attributes->name->toBe('Skyhawk Invite'),
    );
});

it('should filter meets based on sport', function () {
    Meet::factory()->sequence(
        ['name' => 'Skyhawk Invite'],
        ['name' => 'Utah County Invitational'],
        ['name' => 'XC Meet', 'sport' => 'XC']
    )
        ->count(3)
        ->create();

    $meetResponse = getJson(route('meets.index', ['filter[sport]' => 'TRACK']))
        ->json('data');

    expect($meetResponse)->sequence(
        fn($meet) => $meet->attributes->name->toBe('Skyhawk Invite'),
        fn($meet) => $meet->attributes->name->toBe('Utah County Invitational'),
    );
});

it('should filter meets based on name', function () {
    Meet::factory()->sequence(
        ['name' => 'Skyhawk Invite'],
        ['name' => 'Utah County Invitational'],
        ['name' => 'XC Meet', 'sport' => 'XC']
    )
        ->count(3)
        ->create();

    $meetResponse = getJson(route('meets.index', ['filter[name]' => 'XC']))
        ->json('data');

    expect($meetResponse)->sequence(
        fn($meet) => $meet->attributes->name->toBe('XC Meet'),
    );
});

it('should filter meets based on is_sanctioned', function () {
    Meet::factory()->sequence(
        ['name' => 'Skyhawk Invite', 'is_sanctioned' => 1],
        ['name' => 'Utah County Invitational', 'is_sanctioned' => 1],
        ['name' => 'XC Meet', 'sport' => 'XC', 'is_sanctioned' => 0]
    )
        ->count(3)
        ->create();

    $meetResponse = getJson(route('meets.index', ['filter[is_sanctioned]' => 1]))
        ->json('data');

    expect($meetResponse)->sequence(
        fn($meet) => $meet->attributes->name->toBe('Skyhawk Invite'),
        fn($meet) => $meet->attributes->name->toBe('Utah County Invitational'),
    );

    $meetResponse = getJson(route('meets.index', ['filter[is_sanctioned]' => 0]))
        ->json('data');

    expect($meetResponse)->sequence(
        fn($meet) => $meet->attributes->name->toBe('XC Meet'),
    );
});

it('should filter meets based on is_indoor', function () {
    Meet::factory()->sequence(
        ['name' => 'Skyhawk Invite', 'is_indoor' => 1],
        ['name' => 'Utah County Invitational', 'is_indoor' => 1],
        ['name' => 'XC Meet', 'sport' => 'XC', 'is_indoor' => 0]
    )
        ->count(3)
        ->create();

    $meetResponse = getJson(route('meets.index', ['filter[is_indoor]' => 1]))
        ->json('data');

    expect($meetResponse)->sequence(
        fn($meet) => $meet->attributes->name->toBe('Skyhawk Invite'),
        fn($meet) => $meet->attributes->name->toBe('Utah County Invitational'),
    );

    $meetResponse = getJson(route('meets.index', ['filter[is_indoor]' => 0]))
        ->json('data');

    expect($meetResponse)->sequence(
        fn($meet) => $meet->attributes->name->toBe('XC Meet'),
    );
});
