<?php

use Illuminate\Database\Seeder;

/**
 * Seeder da tabela de funcionários
 * 
 */
class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Insere o usuario administrador
        DB::table('usuarios')->insert([
            'nome'         => 'ADMIN',
            'email'        => 'admin@admin.com',
            'senha'        => bcrypt('senha123'),
            'nivel_acesso' => 'A',
            'status'       => 'A',
            'created_at'   => date( 'y-m-d H:i:s', time() )
        ]);
    }
}

// End of file
