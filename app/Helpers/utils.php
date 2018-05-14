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

// End of file