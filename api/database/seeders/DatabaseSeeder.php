<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\Organization;
use App\Models\Result;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        /////// START SALEM HILLS /////////
        $salem = Organization::factory()
            ->has(Athlete::factory()->boy()->highSchooler()->count(10))
            ->has(Athlete::factory()->girl()->highSchooler()->count(10))
            ->create([
                'uuid' => 'uuid-1',
                'name' => 'Salem Hills High School',
            ]);

        $skyhawk_stadium_venue = $salem->venues()->create([
            'uuid'             => 'uuid-1',
            'name'             => 'Skyhawk Stadium',
            'surface_material' => 'MONDO',
        ]);

        $skyhawk_stadium_venue->address()->create([
            'addressable_type' => 'Venue',
            'addressable_id'   => $skyhawk_stadium_venue->id,
            'country_code'     => 'US',
            'state_code'       => 'UT',
            'city'             => 'Salem',
            'zip'              => '84653',
            'line_1'           => '150 N Skyhawk Blvd',
        ]);

        $skyhawk_first_flight_meet = $salem->meets()->create([
            'uuid'     => 'uuid-1',
            'sport'    => 'TRACK',
            'name'     => 'Skyhawk First Flight',
            'venue_id' => $skyhawk_stadium_venue->id,
        ]);

        $skyhawk_first_flight_meet->meetSessions()->create([
            'starting_at' => Carbon::now()->addWeek()->hour(14)->minute(0)->second(0),
        ]);

        $skyhawk_first_flight_meet_division_varsity = $skyhawk_first_flight_meet->meetDivisions()->create([
            'name'       => 'Varsity',
            'abbr'       => 'V',
            'level'      => 'HIGH_SCHOOL',
            'identifier' => 1,
        ]);

        $first_flight_events = $skyhawk_first_flight_meet_division_varsity->meetEvents()->createMany([
            [
                'event_id' => 1,
            ],
            [
                'event_id' => 2,
            ],
            [
                'event_id' => 3,
            ],
            [
                'event_id' => 4,
            ],
        ]);

        foreach ($first_flight_events as $first_flight_event) {
            $first_flight_event->meetEventRounds()->create([
                'round' => 'FINALS',
            ]);
        }

        $i = 1;
        while ($i <= 4) {
            foreach ($first_flight_events as $first_flight_event) {
                $first_flight_event->meetEventEntries()->create([
                    'organization_id' => $salem->id,
                    'athlete_id'      => $salem->athletes()->where('gender',
                        $first_flight_event->event->gender)->get()->random()->id,
                ]);
            }
            $i++;
        }

        foreach ($skyhawk_first_flight_meet->meetEventEntries as $meetEventEntry) {
            $result = Result::factory()->create([
                'meet_id'             => $skyhawk_first_flight_meet->id,
                'meet_event_id'       => $meetEventEntry->meet_event_id,
                'meet_event_entry_id' => $meetEventEntry->id,
                'athlete_id'          => $meetEventEntry->athlete->id,
            ]);
        }

        $skyhawk_invitational_meet = $salem->meets()->create([
            'uuid'     => 'uuid-2',
            'sport'    => 'TRACK',
            'name'     => 'Skyhawk Invitational',
            'venue_id' => $skyhawk_stadium_venue->id,
        ]);

        $skyhawk_invitational_meet->meetSessions()->create([
            'starting_at' => Carbon::now()->addMonth()->hour(14)->minute(0)->second(0),
            'ending_at'   => Carbon::now()->addMonth()->hour(22)->minute(0)->second(0),
        ]);

        $skyhawk_invitational_meet->meetSessions()->create([
            'starting_at' => Carbon::now()->addMonth()->addDay()->hour(14)->minute(0)->second(0),
            'ending_at'   => Carbon::now()->addMonth()->addDay()->hour(22)->minute(0)->second(0),
        ]);

        $skyhawk_invitational_meet_division_varsity = $skyhawk_invitational_meet->meetDivisions()->create([
            'name'       => 'Varsity',
            'abbr'       => 'V',
            'level'      => 'HIGH_SCHOOL',
            'identifier' => 1,
        ]);

        $skyhawk_invitational_meet_division_jv = $skyhawk_invitational_meet->meetDivisions()->create([
            'name'       => 'Junior Varsity',
            'abbr'       => 'JV',
            'level'      => 'HIGH_SCHOOL',
            'identifier' => 2,
        ]);

        $skyhawk_invitational_events = $skyhawk_invitational_meet_division_varsity->meetEvents()->createMany([
            [
                'event_id' => 1,
            ],
            [
                'event_id' => 2,
            ],
            [
                'event_id' => 3,
            ],
            [
                'event_id' => 4,
            ],
        ]);

        $i = 1;
        while ($i <= 4) {
            foreach ($skyhawk_invitational_events as $meet_event) {
                $meet_event->meetEventEntries()->create([
                    'organization_id' => $salem->id,
                    'athlete_id'      => $salem->athletes()->where('gender',
                        $meet_event->event->gender)->get()->random()->id,
                ]);
            }
            $i++;
        }

        $coach = User::factory()->create([
            'uuid'       => 'uuid-1',
            'first_name' => 'Coach',
            'last_name'  => 'Salem Hills',
            'email'      => 'salemhills@trackbot.test',
        ]);

        /////// START SPANISH FORK /////////
        $spanish_fork = Organization::factory()
            ->has(Athlete::factory()->boy()->highSchooler()->count(10))
            ->has(Athlete::factory()->girl()->highSchooler()->count(10))
            ->create([
                'uuid' => 'uuid-2',
                'name' => 'Spanish Fork High School',
            ]);

        $don_stadium_venue = $spanish_fork->venues()->create([
            'uuid'             => 'uuid-2',
            'name'             => 'Don Stadium',
            'surface_material' => 'RUBBER',
        ]);

        $don_stadium_venue->address()->create([
            'addressable_type' => 'Venue',
            'addressable_id'   => $don_stadium_venue->id,
            'country_code'     => 'US',
            'state_code'       => 'UT',
            'city'             => 'Spanish Fork',
            'zip'              => '84660',
            'line_1'           => '99 N 300 W',
        ]);

        $spanish_fork_challenge_meet = $spanish_fork->meets()->create([
            'uuid'     => 'uuid-3',
            'sport'    => 'TRACK',
            'name'     => 'Spanish Fork Challenge',
            'venue_id' => $don_stadium_venue->id,
        ]);

        $don_midnight_invite = $spanish_fork->meets()->create([
            'uuid'     => 'uuid-4',
            'sport'    => 'TRACK',
            'name'     => 'Don Midnight Invite',
            'venue_id' => $don_stadium_venue->id,
        ]);

        $don_midnight_invite_division_varsity = $don_midnight_invite->meetDivisions()->create([
            'name'       => 'Varsity',
            'abbr'       => 'V',
            'level'      => 'HIGH_SCHOOL',
            'identifier' => 1,
        ]);

        $coach = User::factory()->create([
            'uuid'       => 'uuid-2',
            'first_name' => 'Coach',
            'last_name'  => 'Spanish Fork',
            'email'      => 'spanishfork@trackbot.test',
        ]);

        $skyhawk_first_flight_meet->organizationsAttending()->attach([$salem->id, $spanish_fork->id]);
    }
}
