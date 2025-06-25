<?php

namespace Database\Factories;

use App\Models\Assessment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssessmentQuestion>
 */
class AssessmentQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $options = [
            'A' => $this->faker->word(),
            'B' => $this->faker->word(),
            'C' => $this->faker->word(),
            'D' => $this->faker->word(),
        ];

        return [
            'assessment_id' => Assessment::factory(),
            'question_text' => $this->faker->sentence(),
            'options' => $options,
            'correct_answer' => $this->faker->randomElement(array_keys($options)),
            'score' => $this->faker->numberBetween(1, 5),
        ];
    }
}