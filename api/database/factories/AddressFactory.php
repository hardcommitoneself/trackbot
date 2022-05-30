<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nnjeim\World\Models\City;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'line_1'       => $this->faker->streetAddress(),
            'city'         => $this->faker->city(),
            'country_code' => $this->faker->countryCode(),
            'state_code'   => $this->faker->stateAbbr(),
            'zip'          => $this->faker->postcode(),
        ];
    }
}
