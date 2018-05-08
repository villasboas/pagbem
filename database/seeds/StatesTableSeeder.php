<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        // Carrega o arquivo
        $path = 'database/seeds/SQLS/states.sql';
        DB::unprepared( file_get_contents( $path ) );

        // Informa o comando
        $this->command->info('State table seeded!');
    }
}

// End of file

