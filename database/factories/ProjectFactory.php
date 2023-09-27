<?php

namespace Database\Factories;

use App\Models\ProjectType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'            => $this->faker->name,
            'description'     => $this->faker->paragraph(rand(2,4)),
            'creation_year'   => strval(rand(2020,2023)),
            'creation_month'  => $this->faker->numberBetween(01,12),
            'project_type_id' => rand(1,3)
        ];
    }
}
