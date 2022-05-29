<?php

namespace Database\Seeders;

use App\Models\Organization;
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
            ->create([
                'name' => 'Salem Hills High School',
            ]);

        $skyhawk_stadium_venue = $salem->venues()->create([
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
            'sport'           => 'TRACK',
            'name'            => 'Skyhawk First Flight',
            'venue_id'        => $skyhawk_stadium_venue->id,
            'classifications' => ['HIGH_SCHOOL'],
        ]);

        $skyhawk_first_flight_meet->sessions()->create([
            'starting_at' => Carbon::now()->addWeek()->hour(14)->minute(0)->second(0),
        ]);

        $skyhawk_invitational_meet = $salem->meets()->create([
            'sport'           => 'TRACK',
            'name'            => 'Skyhawk Invitational',
            'venue_id'        => $skyhawk_stadium_venue->id,
            'classifications' => ['HIGH_SCHOOL', 'MIDDLE_SCHOOL'],
        ]);

        $skyhawk_invitational_meet->sessions()->create([
            'starting_at' => Carbon::now()->addMonth()->hour(14)->minute(0)->second(0),
            'ending_at'   => Carbon::now()->addMonth()->hour(22)->minute(0)->second(0),
        ]);

        $skyhawk_invitational_meet->sessions()->create([
            'starting_at' => Carbon::now()->addMonth()->addDay()->hour(14)->minute(0)->second(0),
            'ending_at'   => Carbon::now()->addMonth()->addDay()->hour(22)->minute(0)->second(0),
        ]);

        $coach = User::factory()->create([
            'first_name' => 'Coach',
            'last_name'  => 'Salem Hills',
            'email'      => 'salemhills@trackbot.test',
        ]);

        /////// START SALEM HILLS /////////
        $spanish_fork = Organization::factory()
            ->create([
                'name' => 'Spanish Fork High School',
            ]);

        $don_stadium_venue = $spanish_fork->venues()->create([
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
            'sport'    => 'TRACK',
            'name'     => 'Spanish Fork Challenge',
            'venue_id' => $don_stadium_venue->id,
        ]);

        $don_midnight_invite = $spanish_fork->meets()->create([
            'sport'    => 'TRACK',
            'name'     => 'Don Midnight Invite',
            'venue_id' => $don_stadium_venue->id,
        ]);

        $coach = User::factory()->create([
            'first_name' => 'Coach',
            'last_name'  => 'Spanish Fork',
            'email'      => 'spanishfork@trackbot.test',
        ]);
    }
}
