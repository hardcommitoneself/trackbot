<?php

namespace Database\Factories;

use App\Enums\OrganizationType;
use App\Enums\Sport;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sport'             => Sport::TRACK,
            'organization_type' => OrganizationType::HIGH_SCHOOL,
            'name'              => $this->faker->company(),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Organization $organization) {
            // create a sensible abbr from the name
            if (empty($organization->abbr)) {
                $organization->abbr = strtoupper(substr($organization->name, 0, 5));
            }
        })->afterCreating(function (Organization $organization) {
            //
        });
    }

}
