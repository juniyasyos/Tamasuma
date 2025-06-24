<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactChannel>
 */
class ContactChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['whatsapp', 'telegram', 'email', 'slack', 'phone'];
        $type = $this->faker->randomElement($types);

        switch ($type) {
            case 'whatsapp':
            case 'phone':
                $value = $this->faker->phoneNumber();
                break;
            case 'email':
                $value = $this->faker->unique()->safeEmail();
                break;
            default:
                $value = $this->faker->userName();
        }

        return [
            'user_id' => User::factory(),
            'type' => $type,
            'value' => $value,
            'is_primary' => $this->faker->boolean(30),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
