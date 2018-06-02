@extends('@layouts.blank')
@section('content')
<div class="page">
    <div class="page-single">
      <div class="container">
        <div class="row">
          <div class="col col-login mx-auto">
            <div class="text-center mb-6">
                <a href="{{ url('/')}}">
                  <img src="{{ asset( 'assets/brand/tabler.png' ) }}" class="h-6">
                </a>
            </div>
            <form class="card" action="{{ url('login') }}" method="POST">
              {{ csrf_field() }}
              <div class="card-body p-6">
                <div class="card-title">Entrar no sistema</div>
                
                @femail( 'login', 'email', 'E-mail', 'Digite seu e-mail' )
                @fpassword( 'login', 'senha', 'Senha <a href="'.url('password/forgot').'" class="float-right small">Esqueci minha senha</a>', 'Senha' )
                
                @errorAlert
                
                <div class="form-footer">
                  <button type="submit" class="btn btn-primary btn-block">
                    Fazer login
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection