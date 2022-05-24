<?php

namespace Database\Factories;

use App\Enums\Sport;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meet>
 */
class MeetFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'organization_id' => Organization::factory(),
            'sport'           => Sport::TRACK,
            'name'            => $this->faker->company() . ' ' . $this->faker->randomElement([
                    'Invite', 'Invitational', 'Meet', 'Championships', 'Challenge', 'First Flight', 'Early Bird',
                    'Last Chance',
                ]),
            'is_indoor'       => $this->faker->boolean,
            'is_sanctioned'   => $this->faker->boolean,
            'information'     => $this->faker->realTextBetween(100, 500),
        ];
    }
}
