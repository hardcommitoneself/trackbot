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

### addresses ###

`description`:

+ Stores address information for various models.

`attributes`:

+ `id`: Internal identifier.
+ `uuid`: External identifier.
+ `addressable_type`: Owner model type.
+ `addressable_id`: Owner model id.
+ `country_code`: 2-char country code.
+ `state_code`: 2-char state code.
+ `city`
+ `zip`
+ `line_1`
+ `line_2`
+ `latitude`: Set via google pre-save.
+ `longitude`: Set via google pre-save.
+ `timezone`: Set via google pre-save.
+ `elevation`: Set via google pre-save.

`relationships`:

+ `addressable`: A meet belongs to `Models\Venue`. More added later.

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
+ `director_user_id`: `Models\User` that is the director of the meet.
+ `venue_id`: `Models\Venue` where the meet is to be hosted.
+ `name`: User-provided string identification.
+ `information`: User-provided details about the meet. Rich-text.
+ `is_indoor`: if the meet is held at an indoors venue.
+ `is_sanctioned`: if the meet has been sanctioned by a governing body.

`relationships`:

+ `organization`: A meet belongs to an `Models\Organization`.
+ `venue`: A meet belongs to an `Models\Venue`.
+ `user`: A meet belongs to an `Models\User` via `director_user_id`.
+ `sessions`: A meet has many `Models\MeetSession`.

### meet_divisions

`description`:

+ Track meets can have multiple age groups or school sizes and types. Divisions describe these. Events will be
  associated to the divisions.

`attributes`:

+ `id`: Internal identifier.
+ `uuid`: External identifier.
+ `meet_id`: `Models\Meet` that owns the session.
+ `name`: User-provided name that we will provide options for but free-form allowed (e.g., Varsity, JV).
+ `abbr`: User-provided abbreviation used when showing entries and results.
+ `level`: `Enum\Level` of the division.
+ `identifier`: An internal id used for identifying entries in meet management and timing systems.

`relationships`:

+ `meet`: A meetSession belongs to an `Models\Meet`.

### meet_sessions

`description`:

+ Track meets can be held on multiple days or multiple sessions per day. Here we store these so we can associate the
  events will be held at certain times in the session.

`attributes`:

+ `id`: Internal identifier.
+ `uuid`: External identifier.
+ `meet_id`: `Models\Meet` that owns the session.
+ `starting_at`: User-provided start time for the session (can be before the first event).
+ `ending_at`: User-provided end time for the session (can be null - mostly likely will be).

`relationships`:

+ `meet`: A meetSession belongs to an `Models\Meet`.

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

+ `meets`: An organization has many `Models\Meet`.
+ `venues`: An organization has many `Models\Venue`.

### users ###

`description`:

+ Users of the platform.

`attributes`:

+ `id`: Internal identifier.
+ `uuid`: External identifier.
+ `first_name`
+ `last_name`
+ `email`
+ `timezone`: User-supplied timezone.
+ `default_organization_id`: The default organization to load when the user logs in.
+ `profile_photo_path`: Stores the relative path of the profile photo.
+ `distance_system`: The default `Enums\DistanceSystem` to show distances in for the user.

`relationships`:

+ `organizations`: A user has many `Models\Organization`. // TODO: implement

### venues ###

`description`:

+ Venues describe a physical location where a meet will be held.

`attributes`:

+ `id`: Internal identifier.
+ `uuid`: External identifier.
+ `organization_id`: `Models\Organization` that owns the venue.
+ `name`: User-provided string identification.
+ `description`: User-provided details about the venue. Rich-text.
+ `surface_material`: `Enums\SurfaceMaterial` at the venue.
+ `lanes`: If for a track, the number of lanes used.
+ `capacity`: The number of spectators the venue can accommodate.
+ `parking_information`: User-provided information about the parking details.
+ `profile_photo_path`: Stores the relative path of the profile photo for the venue.

`relationships`:

+ `address`: A venue has one `Models\Address`.
+ `organization`: A venue belongs to an `Models\Organization`.
