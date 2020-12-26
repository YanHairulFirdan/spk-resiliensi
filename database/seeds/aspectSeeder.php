<?php

use App\Aspect;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class aspectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aspects = [
            "regulasi emosi",
            "pengendalian impuls",
            "optimis",
            "percaya diri",
            "analisis kausal",
            "empati",
            "reaching out"
        ];
        $faker = Faker::create('id-ID');
        foreach ($aspects as $key => $aspect) {
            Aspect::create([
                'aspect' => $aspect,
                'strength_suggestion' => $faker->text(100),
                'weak_suggestion' => $faker->text(100)
            ]);
        }
    }
}
