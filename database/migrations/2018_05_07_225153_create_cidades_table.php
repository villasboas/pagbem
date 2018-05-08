<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Cria as tabelas
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estados_id')->unsigned();
            $table->string('nome');
            $table->timestamps();
        });

        // Cria as chaves
        Schema::table('cidades', function( $table ) {
            $table->foreign('estados_id')
                    ->references('id')->on('estados')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::disableForeignKeyConstraints();

        // Apaga a chave
        Schema::table( 'cidades', function( $table ) {
            $table->dropForeign('cidades_estados_id_foreign');
        });

        // Apaga a tabela
        Schema::dropIfExists('cidades');
    }
}

// End of file
