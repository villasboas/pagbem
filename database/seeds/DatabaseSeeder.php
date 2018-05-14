<?php

use Illuminate\Database\Seeder;

/**
 * Realiza todos os seeds
 * 
 */
class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(BanksTableSeeder::class);
    }
}

// End of file

