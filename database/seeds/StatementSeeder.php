<?php

use App\Aspect;
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
        Aspect::query()->get()->each(function ($aspect){
            $this->createStatement($aspect);
        });
    }

    public function createStatement(Aspect $aspect)
    {
        $types = ['positive', 'negative'];
        $faker = Faker::create('ID');

        for ($i=0; $i < 7; $i++) { 
            $aspect->statements()->create([
                'statement' => $faker->text(50),
                'type'      => $types[rand(0,1)]
            ]);
        }
    }
}
