<?php

/**
 * Helpers
 * 
 */
$helpers = [
    'form',
    'auth',
    'date',
    'utils'
];

/**
 * Faz o bootstrap dos arquivos
 *
 * @param [type] $helpers
 * @return void
 */
function bootstrapHelpers( $helpers ) {
    foreach( $helpers as $helper ) {
        include_once( app_path( 'Helpers/'.$helper.'.php' ) );
    }
}
bootstrapHelpers( $helpers );

// End of file
