<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Movimentacoes extends Model {
    
    /**
     * Nome da tabela no banco de dados
     *
     * @var string
     */
    protected $table = 'movimentacoes';

    /**
     * Campos que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = [
        'contas_bancarias_id',
        'valor',
        'status'
    ];

    /**
     * Obtem o total que entrou
     *
     * @return void
     */
    static function getTotalIn() {
        $result = DB::table('movimentacoes')
        ->select(DB::raw('sum(valor) as total'))
        ->where([ 'tipo' => 'E' ])
        ->first();
        return $result->total ? $result->total : 0;
    }   

    /**
     * Obtem o total que saiu
     *
     * @return void
     */
    static function getTotalOut() {
        $result = DB::table('movimentacoes')
        ->select(DB::raw('sum(valor) as total'))
        ->where([ 'tipo' => 'S' ])
        ->first();
        return $result->total ? $result->total : 0;
    }

    /**
     * Obtem o saldo atual
     *
     * @return void
     */
    static function getBalance() {
        return self::getTotalIn() - self::getTotalOut();
    }
}

// End of file
