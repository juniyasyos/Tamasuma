<?php

namespace Database\Factories;

use App\Models\Assessment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssessmentAttempt>
 */
class AssessmentAttemptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $score = $this->faker->numberBetween(50, 100);
        $maxScore = 100;

        return [
            'assessment_id' => Assessment::factory(),
            'user_id' => User::factory(),
            'score' => $score,
            'max_score' => $maxScore,
            'answers' => [
                1 => 'A',
                2 => 'C',
                3 => 'B',
            ],
            'started_at' => Carbon::now()->subMinutes(15),
            'completed_at' => Carbon::now(),
        ];
    }
}
