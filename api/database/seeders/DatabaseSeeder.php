<?php

namespace Database\Seeders;

use App\Models\Meet;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $salem = Organization::factory()
            ->has(Meet::factory()->count(3))
            ->create([
                'name' => 'Salem Hills High School',
            ]);

        $skyhawk_stadium_venue = $salem->venues()->create([
            'name' => 'Skyhawk Stadium',
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

        $coach = User::factory()->create([
            'first_name' => 'Coach',
            'last_name'  => 'Hansen',
            'email'      => 'coach@trackbot.test',
        ]);
    }
}
