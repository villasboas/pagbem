<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Cria a tabela
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuarios_id')->unsigned();
            $table->string('tela');
            $table->text('descricao');
            $table->timestamps();
        });

        // Cria a chave estrangeira
        Schema::table('logs', function( $table ) {
            $table->foreign('usuarios_id')
                ->references('id')->on('usuarios')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::disableForeignKeyConstraints();
        
        // Apaga a chave
        Schema::table( 'logs', function( $table ) {
            $table->dropForeign('logs_usuarios_id_foreign');
        });

        // Apaga a tabela
        Schema::dropIfExists('logs');
    }
}

// End of file
