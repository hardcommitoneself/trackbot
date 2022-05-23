<?php

namespace Database\Seeders;

use App\Models\Meet;
use App\Models\Org;
use Database\Factories\MeetFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $salem = Org::factory()
             ->has(Meet::factory()->count(3))
             ->create([
             'name' => 'Salem Hills High School',
         ]);

    }
}
