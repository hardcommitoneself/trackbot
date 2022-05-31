<?php

namespace Database\Factories;

use App\Models\Athlete;
use App\Models\Event;
use App\Models\Meet;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'athlete_id'      => Athlete::factory(),
            'organization_id' => Organization::factory(),
            'meet_id'         => Meet::factory(),
            'event_id'        => Event::all()->random()->id,
            'at'              => now(),
            'is_official'     => $this->faker->boolean,
            'place'           => $this->faker->numberBetween(1, 100),
            'points'          => $this->faker->randomElement([null, '10', '8', '6', '4', '2', '1', '.5', '.25']),
        ];
    }
}
