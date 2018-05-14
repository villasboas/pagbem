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

// End of file