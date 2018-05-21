<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 ml-auto text-right">
          <span class="text-success">
            Saldo: {{ money( \App\Models\Movimentacoes::getBalance() ) }}
          </span>
        </div>
        <div class="col-lg order-lg-first">
          <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link"><i class="fa fa-line-chart"></i> &nbsp;Indicadores</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('clientes') }}" class="nav-link"><i class="fa fa-users"></i> &nbsp; Clientes</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('cobrancas') }}" class="nav-link"><i class="fa fa-money"></i> &nbsp; Cobranças</a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                <i class="fa fa-university"></i>Meu Dinheiro
              </a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ url('contas') }}" class="dropdown-item ">Contas bancárias</a>
                <a href="{{ url('transferencias') }}" class="dropdown-item ">Transferências</a>
                <a href="{{ url('movimentacoes') }}" class="dropdown-item ">Movimentações</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                <i class="fa fa-wrench"></i> Sistema
              </a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ url('usuarios') }}" class="dropdown-item ">Usuários</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>