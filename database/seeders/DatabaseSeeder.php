<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* User Seeder */
        \App\Models\User::factory(10)->create();

        \App\Models\Category::factory(5)->create();
        \App\Models\JobType::factory(5)->create();

        \App\Models\Job::factory(20)->create();



       /* Admin Seeder*/

//        \App\Models\User::factory(1)->create();

    }
}