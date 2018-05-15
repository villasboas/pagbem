<div class="col-xs-12 col-sm-12 col-md-5">
    
    @if($clientes = session()->get('cliente'))
    <form action="{{ url('clientes/'.$clientes->id) }}" method="POST" class="card">
    @else
    <form action="{{ url('clientes') }}" method="POST" class="card">
    @endif

      {{ csrf_field() }}

      <div class="card-header">
          Formulário cliente
          @if($clientes = session()->get('cliente'))
          <div class="card-options">
            <a href="{{ url('clientes' )}}" class="btn btn-info">
              Voltar
            </a>
          </div>
          @endif
      </div>

      <div class="card-body">
          <div class="row">
              <div class="col">
                  @fgroup( 'cliente','nome', '* Nome', 'Digite seu nome' )
              </div>
          </div>

          <div class="row">
              <div class="col-4">
                  @select('tipo_documento', '* Tipo')
                    @option('cliente', 'tipo_documento', 'J', 'CNPJ' )
                    @option('cliente', 'tipo_documento', 'F', 'CPF' )
                  @endselect('tipo_documento')
              </div>
              <div class="col">
                  @fgroup( 'cliente','documento', '* Nº do documento', 'Digite o seu documento' )
              </div>
          </div>

          <div class="page-header">
            <h6>Dados de contato</h6>
          </div>

          <div class="row">
            <div class="col">
              @femail('cliente', 'email', '* E-mail', 'Informe um e-mail' )
            </div>
          </div>

          <div class="row">
            <div class="col">
              @fgroup( 'cliente','telefone', '* Telefone', '(**) ****-****')
            </div>
            <div class="col">
              @fgroup( 'cliente','celular', '* Celular', '(**) *****-****')
            </div>
          </div>

          <div class="page-header">
            <h6>Dados de localização</h6>
          </div>

          <div class="row">
            <div class="col">                
              @select('estados_id', '* Estado')
                @foreach( $estados as $estado )
                @option('cliente', 'estados_id', $estado->id, $estado->nome )
                @endforeach
              @endselect('estados_id')
            </div>
            <div class="col">
              @select('cidades_id', '* Cidade')
              @endselect('cidades_id')
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              @fgroup( 'cliente','cep', '* CEP')
            </div>
            <div class="col">
              @fgroup( 'cliente','logradouro', '* Logradouro')
            </div>
            <div class="col-2">
              @fgroup( 'cliente','numero', '* Nº', '99' )
            </div>
          </div>

          <div class="row">
            <div class="col">
              @fgroup( 'cliente','bairro', '* Bairro')
            </div>
            <div class="col">
              @fgroup( 'cliente','complemento', 'Complemento' )
            </div>
          </div>

          <div class="page-header">
            <h6>Dados de disponibilidade</h6>
          </div>

          <div class="row">
            <div class="col">                
              @select('status', '* Status')
                @option('cliente', 'status', 'A', 'Ativo' )
                @option('cliente', 'status', 'I', 'Inadinplente' )
                @option('cliente', 'status', 'B', 'Bloqueado' )
              @endselect('status')
            </div>
          </div>

      </div>

      <div class="card-footer">
        <button class="btn btn-success btn-block">
          Salvar cliente
        </button>
      </div>
    </form>
</div>

@push('scripts')
<script>
  @php

  $sessionValue = session()->get('cliente') ? session()->get('cliente')->cidades_id : null;
  $oldValue = old('cidades_id', null);
  $oldValue = $oldValue ? $oldValue : $sessionValue;

  @endphp
  $( document ).ready( function() {
    $( '#cidades_id' ).liveSelect({
        parent: '#estados_id',
        url: '{{ url( 'api/v1/estado/{parentValue}/cidades' ) }}',
        placeholder: '* Qual a cidade?',
        {{ $sessionValue ? 'value: '.$sessionValue.',' : '' }}
        parser: function( data ) {
            if ( data.status == 200 ) {
                return data.data.map( function( item ) {
                    return {
                        label: item.nome,
                        value: item.id
                    };
                });
            } else return [];
        }
    });
});
</script>
@endpush