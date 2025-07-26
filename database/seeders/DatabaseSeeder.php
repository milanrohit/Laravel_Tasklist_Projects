<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Task::factory(20)->create();

        // Create 10 users
        User::factory(10)->create();

        // Create 2 unverified users
        User::factory(2)->unverified()->create();

        User::factory(2)->unverified()->create();

        // Create 20 tasks
        Task::factory(20)->create();
    }
}
