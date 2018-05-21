<?php

/**
 * Remove os itens nulos do array
 *
 * @param [type] $arr
 * @return void
 */
function removeIfNull( $arr ) {
    return array_filter($arr, function($item ) {
        return $item;
    });
}

/**
 * Renderiza no formato de dinheiro
 * 
 */
function money( $number, $sign = 'R$ ' ) {
    return $sign.number_format($number, 2, ',', '.' );
}

// End of file