<?php

namespace App\Models;

use App\Core\Token;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash as Hash;

class Usuarios extends Model {
    
    /**
     * Nome da tabela no banco de dados
     * 
     */
    protected $table = 'usuarios';

    /**
     * Campos que podem ser preenchidos com
     * o método fill
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'nivel_acesso',
        'status'
    ];

    /**
     * Boot da model
     *
     * @return void
     */
    static function boot() {
        self::observe( \App\Observers\UsuariosObserver::class);
    }

    /**
     * Tenta fazer o login de um usuário no sistema
     *
     * @param [type] $email
     * @param [type] $senha
     * @return void
     */
    static function doLogin( $email, $senha ) {

        // Busca o usuário com o e-mail encontrado
        $user = self::where('email', $email)->first();
        if ( !$user ) throw new \Error('Nenhum usuário com o e-mail informado.');

        // Verifica se a senha esta correta
        if ( !Hash::check( $senha, $user->senha ) ) throw new \Error('Senha digitada está incorreta.' );
        
        // Verifica se o usuário esta bloqueado ou não
        if ( $user->status != 'A' ) throw new \Error('Usuário bloqueado pelo administrador.' );

        // Gera o token de login
        $user->ultimo_login  = agora();
        $user->ultimo_ip     = request()->ip();
        $user->codigo_sessao = Token::generate();

        // Salva os dados alterados
        $user->save();

        // Salva o token na sessao
        session()->put('_session_token', $user->codigo_sessao );

        // Volta sucesso
        return true;
    }
}

// End of file
