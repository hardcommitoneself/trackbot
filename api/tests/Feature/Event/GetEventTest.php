<?php

use App\Models\Event;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\getJson;

it('should return 404 if an event is not found', function () {
    getJson(route('events.show', ['event' => 'not-exists']))
        ->assertStatus(Response::HTTP_NOT_FOUND);
});

it('should return 400 if attempting to filter by unsupported field', function () {
    getJson(route('events.index', ['filter[not-exists]' => 'not-exists']))
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('it can get a single event', function () {
    $event = Event::whereConstant('girls-100-meter-hurdles')->first();

    $eventResponse = getJson(route('events.show', compact('event')))
        ->json('data');

    expect($eventResponse)
        ->attributes->constant->toBe('girls-100-meter-hurdles');
});
