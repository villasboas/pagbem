@extends('@layouts.master') @section('content')
<div class="page">
	<div class="page-single">
	  <div class="container">
		<div class="row">
		  <div class="col col-login mx-auto">
			<div class="text-center mb-6">
			  <img src="./assets/brand/tabler.svg" class="h-6" alt="">
			</div>
			<form class="card" action="" method="post">
			  <div class="card-body p-6">
				<div class="card-title">Esqueceu sua senha?</div>
				<p class="text-muted">Digite seu e-mail e enviaremos um link de recuperação.</p>
				
					@femail( 'email', 'E-mail', 'Informe seu e-mail' )

				<div class="form-footer">
				  <button type="submit" class="btn btn-primary btn-block">
						Enviar link de recuperação
					</button>
				</div>
			  </div>
			</form>
			<div class="text-center text-muted">
				Obrigado, mas <a href="{{ url('login') }}">me mande de volta</a> para a página de login.
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
@endsection