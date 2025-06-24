<?php

namespace Database\Seeders;

use App\Models\ContactChannel;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Database\Seeders\UserManagementSeeder;
use Database\Seeders\SistemPembelajaranSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserManagementSeeder::class,
            SistemPembelajaranSeeder::class
        ]);
    }
}
