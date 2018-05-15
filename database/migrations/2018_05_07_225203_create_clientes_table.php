<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Cria a tabela
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cidades_id')->unsigned();
            $table->string('nome');
            $table->string('documento');
            $table->char('tipo_documento', 1 );
            $table->string('email');
            $table->string('celular');
            $table->string('telefone');
            $table->string('cep');
            $table->text('logradouro');
            $table->integer('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->char('status', 1 );
            $table->timestamps();
        });

        // Cria as chaves
        Schema::table('clientes', function( $table ) {
            $table->foreign('cidades_id')->references('id')->on('cidades');
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
        Schema::table( 'clientes', function( $table ) {
            $table->dropForeign('clientes_cidades_id_foreign');
        });

        // Apaga a tabela
        Schema::dropIfExists('clientes');
    }
}

// End of file
