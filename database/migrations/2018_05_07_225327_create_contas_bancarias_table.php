<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContasBancariasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Cria a tabela
        Schema::create('contas_bancarias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bancos_id')->unsigned();
            $table->string('nome');
            $table->integer('agencia');
            $table->integer('digito_agencia')->nullable();
            $table->integer('conta');
            $table->integer('digito_conta')->nullable();
            $table->char('tipo_conta', 1 );
            $table->string('titular');
            $table->string('documento_titular');
            $table->char('tipo_documento_titular', 1 );
            $table->string('email_titular');
            $table->string('celular_titular');
            $table->char('status', 1 );
            $table->timestamps();
        });

        // Cria as chaves
        Schema::table('contas_bancarias', function( $table ) {
            $table->foreign('bancos_id')
                  ->references('id')->on('bancos')
                  ->onDelete('cascade');
        });

        // Cria a chave
        Schema::table('faturas', function( $table ){
            $table->foreign('contas_bancarias_id')->references('id')->on('contas_bancarias');
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
        Schema::table( 'contas_bancarias', function( $table ) {
            $table->dropForeign('contas_bancarias_bancos_id_foreign');
        });

        // Apaga a chave
        Schema::table('faturas', function( $table ){
            $table->dropForeign('faturas_contas_bancarias_id_foreign');
        });

        // Apaga a tabela
        Schema::dropIfExists('contas_bancarias');
    }
}

// End of file
