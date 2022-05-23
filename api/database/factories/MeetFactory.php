<?php

namespace Database\Factories;

use App\Enums\Sport;
use App\Models\Org;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meet>
 */
class MeetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'org_id'              => Org::factory(),
            'sport' => Sport::TRACK,
            'name'                => $this->faker->company() . ' ' . $this->faker->randomElement([
                    'Invite', 'Invitational', 'Meet', 'Championships', 'Challenge', 'First Flight', 'Early Bird',
                    'Last Chance',
                ]),
            'is_sanctioned'       => $this->faker->boolean,
            'info'               => $this->faker->realTextBetween(100, 500),
        ];
    }
}
