<?php

/**
 * Obtem a data atual formatada para mysql
 *
 * @param string $format
 * @param boolean $timestamp
 * @return void
 */
function agora( $format = 'Y-m-d H:i:s' ) {
    return date( $format, time() );
}

/**
 * Volta uma data qualquer no formato de leitura
 *
 * @param [type] $str
 * @return void
 */
function paraLer($str) {
    return date('d/m/Y', strtotime($str));
}

// End of file