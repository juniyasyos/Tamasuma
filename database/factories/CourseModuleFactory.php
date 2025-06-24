<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseModule>
 */
class CourseModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['text', 'video', 'quiz'];

        return [
            'title' => $this->faker->sentence(4),
            'type' => $this->faker->randomElement($types),
            'content' => $this->faker->paragraphs(2, true),
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
