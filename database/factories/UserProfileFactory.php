<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'    => User::factory(),
            'full_name'  => $this->faker->name(),
            'photo'      => $this->faker->optional()->imageUrl(200, 200, 'people'),
            'birth_date' => $this->faker->optional()->date(),
            'gender'     => $this->faker->randomElement(['male', 'female']),
            'occupation' => $this->faker->jobTitle(),
            'bio'        => $this->faker->optional()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
