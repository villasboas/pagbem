@extends('@layouts.blank') 
@section('content')
<div class="page">
    <div class="page-main">

        @include( '@components.header' )
        @include( '@components.navbar' )


      <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 offset-md-3">
                    <div class="page-header">
                        <h1 class="page-title">
                            Meu perfil
                        </h1>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Informações do usuário
                        </div>
                        <div class="card-body">
                            @femail( 'login', 'email', 'E-mail', 'Digite seu e-mail' )
                            @fgroup('usuarios', 'nome', '* Nome completo', 'Digite o nome' )
                            @fpassword('unfillable', 'senha', '* Senha', '********' )
                            @fpassword('unfillable', 'confirmacao_senha', '* confirmação de senha', '*******' )
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col text-right">
                                    <button class="btn btn-success">
                                        Salvar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

    @include( '@components.footer' )
  </div>
@endsection
