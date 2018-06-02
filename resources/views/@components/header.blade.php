<div class="header py-4">
    <div class="container">
      <div class="d-flex">
        <a class="header-brand" href="{{ url('/') }}">
          <img src="{{ asset( 'assets/brand/tabler.png' ) }}" class="header-brand-img" alt="tabler logo">
        </a>
        <div class="d-flex order-lg-2 ml-auto">
          <div class="dropdown">
            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
              <span class="ml-2 d-none d-lg-block">
                <span class="text-default">{{ user()->nome }}</span>
                <small class="text-muted d-block mt-1">
                  @switch( user()->nivel_acesso )
                    @case('A')
                      Administrador
                    @break
                    @case('F')
                      Funcionário
                    @break
                  @endswitch
                </small>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
              <a class="dropdown-item" href="{{ url('profile') }}">
                <i class="dropdown-icon fe fe-user"></i> Perfil
              </a>
              <a class="dropdown-item" href="{{ url('logout') }}">
                <i class="dropdown-icon fe fe-log-out"></i> Sair
              </a>
            </div>
          </div>
        </div>
        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
          <span class="header-toggler-icon"></span>
        </a>
      </div>
    </div>
  </div>