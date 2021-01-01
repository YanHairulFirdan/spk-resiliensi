<?php

use App\Answear;
use App\Score;
use App\User;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $faker;
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
        $this->faker =  Factory::create();
        foreach ($classArr as $key => $class) {
            for ($usercount = 0; $usercount < 30; $usercount++) {
                $user = User::create([
                    'name' => $this->faker->name,
                    'username' => $this->faker->unique()->userName,
                    'email' => $this->faker->unique()->safeEmail,
                    'email_verified_at' => now(),
                    'class' => $class,
                    'phoneNumber' => $this->faker->phoneNumber,
                    'password' => Hash::make($this->faker->password), // password
                    'remember_token' => Str::random(10),
                ]);
                App\Score::create([
                    'user_id' => $user->id,
                    'regulasi_emosi' => rand(10, 100),
                    'pengendalian_impuls' => rand(10, 100),
                    'optimis' => rand(10, 100),
                    'percaya_diri' => rand(10, 100),
                    'analisis_kausal' => rand(10, 100),
                    'empati' => rand(10, 100),
                    'reaching_out' => rand(10, 100)
                ]);
                Answear::create([
                    'user_id' => $user->id,
                    'answear_1' => $this->faker->realText(),
                    'answear_2' => $this->faker->realText(),
                    'answear_3' => $this->faker->realText(),
                    'answear_4' => $this->faker->realText(),
                    'answear_5' => $this->faker->realText(),
                    'answear_6' => $this->faker->realText(),
                    'answear_7' => $this->faker->realText(),
                ]);
            }
        }
        // $classArr = [
        //     'X IPA I',
        //     'X IPA II',
        //     'X IPA III',
        //     'X IPA IV',
        //     'X IPA V',
        //     'X IPA VI',
        // ];

        // $faker = Factory::create();
        // for ($i = 0; $i < 5; $i++) {
        //     for ($j = 0; $j < 30; $j++) {
        //         User::create([
        //             'name' => $faker->name,
        //             'username' => $faker->unique()->userName,
        //             'email' => $faker->unique()->safeEmail,
        //             'class' => $classArr[$i],
        //             'email_verified_at' => now(),
        //             'phoneNumber' => $faker->phoneNumber,
        //             'password' => Hash::make($faker->password), // password
        //             'remember_token' => Str::random(10),
        //         ]);
        //     }
        // }
        User::create([
            'username' => 'admin',
            "password" => Hash::make('admin123pass'),
            "role" => 'admin'
        ]);
        User::create([
            'name' => 'king',
            'username' => 'king',
            "password" => Hash::make('admin123pass'),
            "role" => ''
        ]);
    }
}
