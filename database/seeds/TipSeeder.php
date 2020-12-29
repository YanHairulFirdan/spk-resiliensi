<?php

use App\Tip;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();
        for ($i = 1; $i <= 7; $i++) {
            $amount_tips = rand(1, 3);
            // $randAspect = rand(1, 7);
            for ($j = 0; $j < $amount_tips; $j++) {
                Tip::create([
                    'aspect_id' => $i,
                    'tips' => $faker->text()
                ]);
            }
        }
    }
}
