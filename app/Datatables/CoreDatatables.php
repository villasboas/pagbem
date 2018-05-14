<?php

namespace App\Datatables;

class CoreDatatables {

    /**
     * Instancia do builder
     * 
     */
    static $builder;

    /**
     * Colunas das tabelas
     * 
     */
    static $columns = [];
    
    /**
     * Inicia o builder
     *
     * @param [type] $url
     * @return void
     */
    static function builder( $url, $columns = [] ) {

        // Inicia o builder
        self::$builder = app('datatables.html');

        // Seta onde a linguagem esta
        self::$builder->parameters([    
            'language' => [
                'url' => url('https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json')
            ]
        ]);

        // Obtem as colunas
        self::$builder->columns( self::columnsToArray( $columns ) );

        // Seta a url do ajax
        self::$builder->ajax( url( $url ) );

        // Voltar o builder
        return self::$builder;
    }

    /**
     * Obtem o JSON das colunas
     *
     * @return void
     */
    static function columnsToJson($columns) {
        $json = [];
        foreach( $columns as $label => $column ) {
            $json[] = [
                'data'  =>  $column,
                'name'  =>  $column,
                'title' =>  $label
            ];
        }
        return json_encode( $json );
    }

    /**
     * Volta as colunas como um array
     *
     * @return void
     */
    static function columnsToArray($columns) {
        return json_decode( self::columnsToJson($columns), TRUE );
    }
}

// End of file