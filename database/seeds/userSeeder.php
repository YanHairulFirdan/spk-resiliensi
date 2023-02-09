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
        User::query()->firstOrCreate([
            'username' => 'admin',
            "password" => Hash::make('admin123pass'),
            "role" => 'admin'
        ]);

        User::query()->firstOrCreate([
            'username' => 'user',
            'name' => 'user',
            "password" => Hash::make('user123pass'),
            "role" => ''
        ]);
    }
}
