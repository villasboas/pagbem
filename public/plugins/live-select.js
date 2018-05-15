$.fn.liveSelect = function( options ) {
    var self = this;

    // Verifica se existem opcoes
    if ( typeof option == undefined ) options = {};

    /**
     * Limpa o select
     * 
     */
    self.clean = function() {
        
        // Cria a opcao vazia
        var option = $( '<option value="">'+options.placeholder+'</option>' );

        // Limpa o select
        self.html( '' );

        // Adiciona a opcao
        self.append( option );
    }

    /**
     * Habilita o select
     * 
     */
    self.enable = function() {
        self.removeAttr( "readonly" );        
    }

    /**
     * Desabilita o select
     * 
     */
    self.disable = function() {
        self.attr( "readonly", "readonly" );
    }

    /**
     * Preenche o select
     * 
     */
    self.fill = function( data ) {

        // Limpa os dados atuais
        self.clean();

        // Percorre os dados
        for( var d in data ) {

            // Cria a opcao
            var option = $( '<option value="'+data[d].value+'">'+data[d].label+'</option>' );
            
            // Adiciona no select
            self.append( option );
        }

        // Habilita a edicao
        self.enable();

        // Chama o método refresh
        self.selectpicker('refresh');
    }

    /**
     * Executa o ajax para obter os dados do select
     * 
     */
    self.getData = function( url, init ) {

        // Faz a requisicao
        $.getJSON( url, function( data ) {

            // Verifica se existe um parser
            if ( options.parser ) {
                data = options.parser( data );
            } 

            // Preenche o select
            self.fill( data );

            // Verifica se deve setar um valor inicial
            if ( init && options.value ) {
                self.val( options.value );
                self.selectpicker('refresh');
            }
        });
    }

    /**
     * Faz o update dos estados
     * 
     */
    self.update = function( init = false ) {

        // Desabilita a edicao
        self.disable();
        
        // Obtem o valor do pai
        var parentValue = $(options.parent ).val();
        
        // Verifica se existe um valor
        if ( parentValue ) {

            // Monta a url
            var url = options.url.replace( '{parentValue}', parentValue );

            // Faz a requisicao ajax
            self.getData( url, init );
        } else {

            // Limpa o select
            self.clean();
        }
    }

    /**
     * Quando o select PAI for alterado
     */
    $( options.parent ).on('changed.bs.select', self.update );

    /**
     * Indica que o select ja foi atualizado
     * 
     */
    self.on('changed.bs.select', function() {
        self.dirty = true;
    });

    /**
     * Chama o update quando o plugin e instanciado
     * pela primeira vez
     * 
     */
    self.update( true );
};

// End of file