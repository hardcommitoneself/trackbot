<?php

namespace Database\Seeders;

use App\Models\Meet;
use App\Models\Organization;
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
    }
}
