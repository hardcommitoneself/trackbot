<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'organization_id'     => Organization::factory(),
            'name'                => $this->faker->city() . ' ' . $this->faker->randomElement([
                    'Track', 'Stadium', 'Arena',
                ]),
            'description'         => $this->faker->paragraph(),
            'surface_material'    => $this->faker->randomElement([
                'RUBBER', 'MONDO', 'GRASS',
            ]),
            'capacity'            => mt_rand(100, 1000),
            'parking_information' => $this->faker->paragraph(),
            //'profile_photo_path'  => 'profile-photos/' . $this->faker->numberBetween(1, 6) . '.jpg',
        ];
    }

//    public function configure()
//    {
//        return $this->afterMaking(function (Venue $venue) {
//            //
//        })->afterCreating(function (Venue $venue) {
//            Address::factory()->create([
//                'addressable_type' => class_basename($venue),
//                'addressable_id'   => $venue->id,
//            ]);
//        });
//    }
}
