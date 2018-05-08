<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrancasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Cria a tabela
        Schema::create('cobrancas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clientes_id')->unsigned();
            $table->text('descricao');
            $table->decimal('total', 8, 2 );
            $table->integer('parcelas');
            $table->date('vencimento_primeira_parcela');
            $table->char( 'status', 1 );
            $table->timestamps();
        });

        // Cria a chave
        Schema::table('cobrancas', function( $table ){
            $table->foreign('clientes_id')->references('id')->on('clientes');
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
        Schema::table( 'cobrancas', function( $table ) {
            $table->dropForeign('cobrancas_clientes_id_foreign');
        });

        // Apaga a tabela
        Schema::dropIfExists('cobrancas');
    }
}

// End of file
