<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 20) as $value) {
            Db::table('student')->insert([
                'name' => $faker->firstName(),
                'email' => $faker->unique()->safeEmail(),
                'age' => $faker->numberBetween(18, 60)
            ]);
        }
    }
}
