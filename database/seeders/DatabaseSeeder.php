<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProjectTypeSeeder::class,
            ProjectStatusSeeder::class,
            CountrySeeder::class,
            FolderSeeder::class,
            RetirementStatusSeeder::class,
        ]);

        Project::factory()->count(3)->create();
    }
}
