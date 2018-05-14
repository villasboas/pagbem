<div class="col-5">
  @if($usuarios = session()->get('usuarios'))
  <form action="{{ url('usuarios/'.$usuarios->id) }}" method="POST" class="card">
  @else
  <form action="{{ url('usuarios') }}" method="POST" class="card">
  @endif

    {{ csrf_field() }}
      <div class="card-header">
          Formulário usuário

          @if($usuarios = session()->get('usuarios'))
          <div class="card-options">
            <a href="{{ url('usuarios' )}}" class="btn btn-info">
              Voltar
            </a>
          </div>
          @endif
          
      </div>
      <div class="card-body">

          @successAlert

          <div class="row">
              <div class="col">
                  @fgroup('usuarios', 'nome', '* Nome completo', 'Digite o nome' )
              </div>
          </div>

          <div class="page-header">
            <h6>Dados de login</h6>
          </div>

          <div class="row">
            <div class="col">
              @femail('usuarios', 'email', '* E-mail', 'Digite seu e-mail' )
            </div>
          </div> 

          <div class="row">
            <div class="col">
              @fpassword('unfillable', 'senha', '* Senha', '********' )
            </div>
          </div>

          <div class="row">
            <div class="col">
              @fpassword('unfillable', 'confirmacao_senha', '* confirmação de senha', '*******' )
            </div>
          </div>

          <div class="page-header">
            <h6>Dados de segurança</h6>
          </div>

          <div class="row">
            <div class="col">
                @select('nivel_acesso', '* Nivel de acesso')
                  @option('usuarios', 'A', 'Administrador' )
                  @option('usuarios', 'F', 'Funcionário' )
                @endselect('nivel_acesso')
            </div>
          </div>

          <div class="row">
            <div class="col">
                @select('status', '* Status')
                  @option('usuarios', 'status', 'A', 'Ativo' )
                  @option('usuarios', 'status', 'B', 'Bloqueado' )
                @endselect('status')
            </div>
          </div>

      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success btn-block">
          Salvar cliente
        </button>
      </div>
  </form>
</div>