<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacoesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Cria a tabela
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clientes_id')->unsigned();
            $table->integer('faturas_id')->unsigned();
            $table->char('visualizada', 1 );
            $table->timestamps();
        });

        // Cria as chaves
        Schema::table('notificacoes', function( $table ){
            $table->foreign('clientes_id')->references('id')->on('clientes');
            $table->foreign('faturas_id')->references('id')->on('faturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::disableForeignKeyConstraints();

        // Apaga as chaves
        Schema::table('notificacoes', function( $table ){
            $table->dropForeign('notificacoes_clientes_id_foreign');
            $table->dropForeign('notificacoes_faturas_id_foreign');
        });

        // Apaga a tabela
        Schema::dropIfExists('notificacoes');
    }
}

// End of file
