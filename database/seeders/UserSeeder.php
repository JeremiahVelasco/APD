<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        foreach(range(1,5) as $index){
            $yearOfSchool=[2020,2019];
            $studentId=$faker->randomElement($yearOfSchool).$faker->unique()->numberBetween(10000,99999);
            $yearLevel=mt_rand(1,5);
            $middleName=[null,'Soprano','Hearthwell','Preston','Earnest','Sulivan','Barden','Vinnie','Vernon'];
            $program=['BSITWMA','BSITAGD'];
            User::create([
                'studentid'=>$studentId,
                'email'=>$faker->unique()->safeEmail,
                'firstname'=>$faker->firstName,
                'lastname'=>$faker->lastName,
                'middlename'=>$faker->randomElement($middleName),
                'yearlevel'=>$yearLevel,
                'program'=>$faker->randomElement($program),
                'password'=>bcrypt('password')
            ]);
        }
    }
}
