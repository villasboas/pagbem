<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentacoesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Cria a tabela de movimentacoes
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contas_bancarias_id')->unsigned()->nullable();
            $table->integer('faturas_id')->unsigned()->nullable();
            $table->char('tipo', 1);
            $table->decimal('valor', 8, 2);
            $table->timestamps();
        });

        // Cria a chave estrangeira
        Schema::table('movimentacoes', function( $table ) {
            $table->foreign('contas_bancarias_id')
                  ->references('id')->on('contas_bancarias')
                  ->onDelete('cascade');
            $table->foreign('faturas_id')
                  ->references('id')->on('faturas')
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
        Schema::table('movimentacoes', function( $table ) {
            $table->dropForeign('movimentacoes_contas_bancarias_id_foreign');
            $table->dropForeign('movimentacoes_faturas_id_foreign');
        });

        // Apaga a tabela
        Schema::dropIfExists('movimentacoes');
    }
}

// End of file
