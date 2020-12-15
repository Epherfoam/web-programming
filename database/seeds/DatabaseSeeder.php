<?php

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

        //Seed the class
        $this->call([
            UserSeeder::class,
            PizzaSeed::class,
        ]);
    }
}
