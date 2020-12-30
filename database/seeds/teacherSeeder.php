<?php

use App\Teacher;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class teacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classArr = [
            'X IPA I',
            'X IPA II',
            'X IPA III',
            'X IPA IV',
            'X IPA V',
            'X IPA VI',
        ];
        $faker = Factory::create();
        foreach ($classArr as $key => $arr) {
            Teacher::create([
                'name' => $faker->name(),
                'username' => $faker->userName,
                'email' => $faker->email,
                'nip' => $faker->word(),
                'class' => $arr,
                'subject' => $faker->word(),
                'password' => $faker->password()
            ]);
        }
    }
}
