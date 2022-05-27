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

        $coach = User::factory()->create([
            'first_name' => 'Coach',
            'last_name'  => 'Hansen',
            'email'      => 'coach@trackbot.test',
        ]);
    }
}
