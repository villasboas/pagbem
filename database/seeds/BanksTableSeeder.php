<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        // Carrega o arquivo
        $path = 'database/seeds/SQLS/banks.sql';
        DB::unprepared( file_get_contents( $path ) );

        // Informa o comando
        $this->command->info('Bank table seeded!');
    }
}

// End of file