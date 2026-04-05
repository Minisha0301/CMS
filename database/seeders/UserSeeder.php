<?php

namespace Database\Seeders;

use App\Models\Programme;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $password = Hash::make('12345678');

        $staffCount = 0;
        $maxStaff = 20;

        $programmeMap = Programme::all()->groupBy('department_id');

        for ($i = 0; $i < 5000; $i += 1000) {

            $data = [];

            for ($j = 0; $j < 1000; $j++) {

                $department_id = rand(1, 5);
                $programmes = $programmeMap[$department_id] ?? collect();

                if ($staffCount < $maxStaff) {
                    $userType = 'staff';
                    $staffCount++;
                } else {
                    $userType = 'student';
                }

                $data[] = [
                    'name' => $faker->name,
                    'email' => $faker->safeEmail . rand(1,10000),
                    'password' => $password,
                    'remember_token' => Str::random(10),
                    'user_type' => $userType,
                    'department_id' => $department_id,

                    'programme_id' => ($userType === 'student' && $programmes->count())
                        ? $programmes->random()->id
                        : null,

                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('users')->insert($data);
        }

    }
}
