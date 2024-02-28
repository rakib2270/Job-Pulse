<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'user_id' => rand(1, 5),
            'job_type_id' => rand(1, 5),
            'category_id' => rand(1, 5),
            'vacancy' => rand(1, 5),
            'salary' => rand(1111,9999),
            'application_end' => '2024-03-01',
            'location' => fake()->city,
            'description' =>fake()->paragraph,
            'benefits' => fake()->paragraph,
            'responsibility' => fake()->paragraph,
            'qualifications' => fake()->paragraph,
            'keywords' => fake()->words(3, true),
            'experience' => fake()->word,
            'company_name' => fake()->company,
            'company_location' => fake()->city,
            'company_website' => fake()->url,
        ];
    }
}
