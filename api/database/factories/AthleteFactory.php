<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Athlete>
 */
class AthleteFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gender'             => $this->faker->randomElement(['MALE', 'FEMALE']),
            'hs_graduation_year' => $this->faker->numberBetween(now()->year - 10, now()->year + 10),
            'first_name'         => $this->faker->firstName(),
            'last_name'          => $this->faker->lastName(),
        ];
    }

    public function girl(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'gender'     => 'FEMALE',
                'first_name' => $this->faker->firstNameFemale(),
            ];
        });
    }

    public function boy(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'gender'     => 'MALE',
                'first_name' => $this->faker->firstNameMale(),
            ];
        });
    }

    public function senior(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'hs_graduation_year' => currentTrackYear(),
            ];
        });
    }

    public function highSchooler(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'hs_graduation_year' => $this->faker->numberBetween(currentTrackYear(), currentTrackYear() + 3),
            ];
        });
    }

    public function middleSchooler(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'hs_graduation_year' => $this->faker->numberBetween(currentTrackYear() + 4, currentTrackYear() + 5),
            ];
        });
    }
}
