<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $technologies = ['PHP', 'Vue', 'Laravel', 'Angular', 'Tailwind css'];
        foreach ($technologies as $technology) {
            Technology::create(['name' => $technology]);
        }

        $projectTypes = ['frontend', 'backend', 'full stack'];
        foreach ($projectTypes as $projectType) {
            ProjectType::create(['name' => $projectType]);
        }

        Project::factory()->count(100)->create();

    }
}
