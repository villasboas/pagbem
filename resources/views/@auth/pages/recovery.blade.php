@extends('@layouts.blank')
@section('content')
<section class="login common-img-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="login-card card-block bg-white">
                    <form class="md-float-material" action="index.html">
                        <div class="text-center">
                            <img src="{{ asset( 'assets/images/logo-blue.png' ) }}" alt="logo">
                        </div>
                        <h3 class="text-center txt-primary">Crie uma conta </h3>

                        <div class="md-input-wrapper">
                            <input type="email" class="md-form-control" required="">
                            <label>E-mail</label>
                        </div>
                        <div class="md-input-wrapper">
                            <input type="password" class="md-form-control" required="">
                            <label>Senha</label>
                        </div>
                        <div class="md-input-wrapper">
                            <input type="password" class="md-form-control" required="">
                            <label>Confirme a senha</label>
                        </div>

                        <div class="col-xs-10 offset-xs-1">
                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light m-b-20">
                            Alterar minha senha
                        </button>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <span class="text-muted">Já possuí uma conta?</span>
                                <a href="{{ url('auth') }}" class="f-w-600 p-l-5"> Faça login</a>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of login-card -->
            </div>
        </div>
    </div>
</section>
@endsection