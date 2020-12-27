<?php

use App\Quisioner;
use App\Quisoner;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QuisionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 8; $i++) {
            Quisioner::create([
                'question' => $faker->realText()
            ]);
        }
    }
}
