<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'Project 1',
            'description' => 'Description for Project 1',
            'user_id' => 1
        ]);

        Project::create([
            'name' => 'Project 2',
            'description' => 'Description for Project 2',
            'user_id' => 2
        ]);

        Project::create([
            'name' => 'Project 3',
            'description' => 'Description for Project 3',
            'user_id' => 1
        ]);
    }
}
