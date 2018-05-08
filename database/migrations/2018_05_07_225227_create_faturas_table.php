<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaturasTable extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Cria a tabela
        Schema::create('faturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cobrancas_id')->unsigned();
            $table->integer('contas_bancarias_id')->unsigned()->nullable();
            $table->string('codigo');
            $table->decimal('valor', 8, 2 );
            $table->date('vencimento');
            $table->string('nota_fiscal')->nullable();
            $table->string('link_pagseguro')->nullable();
            $table->char( 'status', 2 );
            $table->timestamps();
        });

        // Cria a chave
        Schema::table('faturas', function( $table ){
            $table->foreign('cobrancas_id')
                ->references('id')->on('cobrancas')
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
        Schema::table('faturas', function( $table ){
            $table->dropForeign('faturas_cobrancas_id_foreign');
        });

        // Apaga a tabela
        Schema::dropIfExists('faturas');
    }
}

// End of file
