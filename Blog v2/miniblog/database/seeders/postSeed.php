<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Faker\Factory as faker;

class postSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();

        $user = new User();
        
        for ($i = 1; $i < 20; $i++) {
            $post = new Post();
            $user->id = rand(1, 4);
            $post->title = $faker->jobTitle;
            $post->body = $faker->text(rand(20, 70));


            $user->posts()->save($post);
        }
    }
}
