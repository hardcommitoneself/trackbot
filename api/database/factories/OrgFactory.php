<?php

namespace Database\Factories;

use App\Enums\OrgType;
use App\Enums\Sport;
use App\Models\Org;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Org>
 */
class OrgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'sport' => Sport::TRACK,
            'org_type' => OrgType::HIGH_SCHOOL,
            'name'        => $this->faker->company(),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Org $org) {
            // create a sensible abbr from the name
            if (empty($org->abbr)) {
                $org->abbr = strtoupper(substr($org->name, 0, 4));
            }
        })->afterCreating(function (Org $org) {
            //
        });
    }

}
