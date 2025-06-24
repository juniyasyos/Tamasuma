<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\CourseModule;
use App\Models\UserProgress;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SistemPembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 5 Course
        $courses = Course::factory(5)->create();

        // Ambil 10 user pertama
        $users = User::take(10)->get();

        foreach ($courses as $course) {
            // Buat 3–6 module per course
            $modules = CourseModule::factory(rand(3, 6))->create([
                'course_id' => $course->id,
            ]);

            foreach ($users as $user) {
                // Daftarkan user ke course ini
                Enrollment::factory()->create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'completed' => false,
                ]);

                foreach ($modules as $module) {
                    $completed = rand(0, 1) === 1;

                    UserProgress::factory()->create([
                        'user_id' => $user->id,
                        'course_module_id' => $module->id,
                        'completed_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }
}