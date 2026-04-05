<?php

namespace Database\Seeders;

use faker\Factory as Faker;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];
        
        for($i=0; $i<20; $i++){
            $data[] = [
                'name' => $faker->word,
                'department_id'=> rand(1,5),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
            ];
        }

        DB::table('programmes')->insert($data);
    }
}
