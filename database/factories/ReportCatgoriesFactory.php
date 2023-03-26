<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportCatgories>
 */
class ReportCatgoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'created_at' => $this->faker->dateTime,
            'report_type'=> $this->faker->randomElement(['blood_report', 'body_report','ent']),
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
