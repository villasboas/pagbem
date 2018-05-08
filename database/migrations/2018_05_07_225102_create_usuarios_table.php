<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('nivel_acesso');
            $table->date('ultimo_login')->nullable();
            $table->string('codigo_recuperacao_senha')->nullable();
            $table->string('codigo_sessao')->nullable();
            $table->string('ultimo_ip')->nullable();
            $table->char('status', 1 );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('usuarios');
    }
}

// End of file
