# trackbot api

## Install

- Create a database called `trackbot`
- Create a test database called `trackbot_tests`
- `cp .env.example .env`
- Setup your database credentials in the .env file
- `composer install`
- `php artisan migrate --seed`

You can run the tests with:
`./vendor/bin/pest`

And serve the API with:
`php artisan serve`

## Database Design

### events ###

`description`:

+ Unchanging inclusive store of the events for both `TRACK` and `XC`. This table is maintained internally and is
  read-only.

`attributes`:

+ `id`: Internal identifier.
+ `constant`: Unchanging human-readable identifier.
+ `sport`: `Enums\Sport`of the event. Will be either `TRACK` or `XC`.
+ `gender`: `Enums\Gender` of the event. We be one of `MALE`, `FEMALE`, or `MIXED`.
+ `mark_type`: `Enums\MarkType` of the event. Will be one of `TIME`, `DISTANCE` or `SCORE`.
+ `is_relay`: if the event is a relay event.
+ `is_field`: if the event is a field event for track.
+ `is_track`: if the event is held on the track for track (is a running event).
+ `is_hurdles`: if the event has hurdles.
+ `is_distance`: if the track event is considered a distance event (800m+).
+ `is_sprint`: if the track event is considered a sprint (400m and less).
+ `is_jump`: if the track event is a jump (long jump, high jump, pole vault).
+ `is_throw`: if the track event is a throw (javelin, shot put, discus).
+ `is_multi`: if the track event involves multiple events (decathlon, heptathlon, etc.).
+ `has_wind`: if the track event records a wind reading.
+ `sort`: used as a default order when showing a list of events (shortest to longest, field, multi).

### meets ###

`description`:

+ All `TRACK` or `XC` meets that are held. These will be created by the users. This is the core of trackbot.

`attributes`:

+ `id`: Internal identifier.
+ `uuid`: External identifier.
+ `sport`: `Enums\Sport`of the event. Will be either `TRACK` or `XC`.
+ `organization_id`: `Models\Organization` that owns the meet and is hosting it.
+ `name`: User-provided string identification.
+ `information`: User-provided details about the meet. Rich-text.
+ `is_indoor`: if the meet is held at an indoors venue.
+ `is_sanctioned`: if the meet has been sanctioned by a governing body.

`relationships`:

+ `organization`: A meet belongs to an `Models\Organization`.

### organizations ###

`description`:

+ The entities that perform some function within the system. Schools of various types, governing bodies, and various
  companies.

`attributes`:

+ `id`: Internal identifier.
+ `uuid`: External identifier.
+ `sport`: `Enums\Sport`that the organization is a part of. There will only be one per organization so we can easily
  show applicable meets / results etc. Will be either `TRACK` or `XC`.
+ `organization_type`: `Enums\OrganizationType` of the organization.
+ `name`: User-provided string identification.
+ `abbr`: A unique abbreviation for the organization. Must be between `3`and `5` characters (alphanumeric, no spaces).

`relationships`:

+ `meets`: An organization as many `Models\Meet`.
