<?php

namespace Database\Seeders;

use App\Models\ContactChannel;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserManagementSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()
            ->create([
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => 'password',
            ]);

        UserProfile::factory()->create(['user_id' => $admin->id]);
        ContactChannel::factory(3)->create(['user_id' => $admin->id]);

        $users = User::factory()->count(20)->create();

        foreach ($users as $user) {
            // Buat 1 profile untuk setiap user
            UserProfile::factory()->create([
                'user_id' => $user->id,
            ]);

            // Buat 1-3 contact channels untuk setiap user
            $contactCount = rand(1, 3);
            for ($i = 0; $i < $contactCount; $i++) {
                ContactChannel::factory()->create([
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
