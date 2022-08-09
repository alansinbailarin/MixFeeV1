<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Tag;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = Job::factory(300)->create();

        foreach ($jobs as $job) {
            Image::factory(1)->create([
                'imageable_id' => $job->id,
                'imageable_type' => Job::class,
            ]);

            $job->tags()->attach([
                rand(1, 4),
                rand(5, 8),
            ]);
        }
    }
}
