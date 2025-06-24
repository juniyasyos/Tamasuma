<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Course::class;

    public function definition(): array
    {

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph,
            // 'instructor_id' => User::factory()->create(['role' => 'instructor'])->id,
        ];
    }
}