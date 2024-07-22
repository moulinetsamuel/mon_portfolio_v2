<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Stack;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $project1 = Project::create([
            'title' => 'Projet 1',
            'description' => 'Description du projet 1',
            'url' => 'https://example.com',
            'github_url' => 'https://github.com/example',
        ]);

        $project1->stacks()->attach(Stack::where('name', 'PHP')->first());
        $project1->stacks()->attach(Stack::where('name', 'Laravel')->first());

        $project2 = Project::create([
            'title' => 'Projet 2',
            'description' => 'Description du projet 2',
            'url' => 'https://example.com',
            'github_url' => 'https://github.com/example',
        ]);

        $project2->stacks()->attach(Stack::where('name', 'JavaScript')->first());
    }
}
