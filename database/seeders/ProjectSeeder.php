<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $project = new Project;
        $project->title = $faker->words(3, true);
        $project->description = $faker->text();
        $project->date = $faker->date();
        $project->thumb = $faker->imageUrl(200, 200);
        $project->save();
    }
}
