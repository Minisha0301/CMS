<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];
        
        for($i=0; $i<5; $i++){
            $data[] = [
                'name' => $faker->word,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
            ];
        }

        DB::table('departments')->insert($data);

    }
}
