<?php

namespace App\Core;

class Token {

    /**
     * Gera um token unico
     *
     * @return void
     */
    static function generate() {
        return md5( uniqid( rand() * time() ) );
    }
}

// End of file
