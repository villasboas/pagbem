@extends('@layouts.master')
@section('content')
<div class="page">
    <div class="page-single">
      <div class="container">
        <div class="row">
          <div class="col col-login mx-auto">
            <div class="text-center mb-6">
              <a href="{{ url('/') }}">
                <img src="./assets/brand/tabler.svg" class="h-6">              
              </a>
            </div>
            <form class="card" action="{{ url('signup') }}" method="POST">
              {{ csrf_field() }}

              <div class="card-body p-6">
                <div class="card-title">Criar uma conta</div>
                
                <div class="row">
                  <div class="col">
                    @fgroup( 'first_name', 'Nome', 'Digite seu nome' )
                  </div>
                  <div class="col">
                    @fgroup( 'last_name', 'Sobrenome', 'Digite seu sobrenome' )
                  </div>
                </div>

                @femail( 'email', 'E-mail', 'Digite um e-mail' )
                @fpassword( 'password', 'Senha', 'Digite uma senha' )
                @fpassword( 'confirm_password', 'Confirme a senha', 'Digite sue senha novamente' )

                <div class="form-group">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-label">Concordo com os <a href="terms.html">termos de uso</a></span>
                  </label>
                </div>

                <div class="form-footer">
                  <button type="submit" class="btn btn-primary btn-block">Criar uma conta</button>
                </div>
              
              </div>
            </form>
            <div class="text-center text-muted">
    
                Já possuí uma conta? {{ Html::link( 'login', 'Entre já' ) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection