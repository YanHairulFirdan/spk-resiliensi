<?php

use App\Statement;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StatementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ID');
        for ($i = 1; $i < 8; $i++) {
            for ($j = 0; $j < rand(7, 10); $j++) {
                Statement::create([
                    'aspect_id' => $i,
                    'statement' => $faker->text(50)
                ]);
            }
        }
    }
}
