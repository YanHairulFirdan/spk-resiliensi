<?php

// use App\Tip;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(aspectSeeder::class);
        $this->call(userSeeder::class);
        // $this->call(StatementSeeder::class);
        // $this->call(userSeeder::class);
        $this->call(TipSeeder::class);
    }
}
