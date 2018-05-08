<?php

/**
 * Obtem a classe se existir o erro
 *
 * @param [type] $field
 * @param [type] $class
 * @return void
 */
function __e( $field, $class ) {

    // Obtem os erros
    $errors = Session::get( 'errors', new Illuminate\Support\MessageBag );

    // Verifica se existe o erro
    return $errors->has( $field ) ? $class : '';
}

/**
 * Imprime os paragrafos de erro
 *
 * @param [type] $errors
 * @param [type] $field
 * @return void
 */
function __bte( $field ) {
    $errors = Session::get( 'errors', new Illuminate\Support\MessageBag );
    if ( $errors->has( $field ) ) {
        return '<div class="invalid-feedback">'.$errors->first( $field ).'</div>';    
    };
}

/**
 * Imprime um form-group
 *
 * @param [type] $name
 * @param [type] $label
 * @param [type] $placeholder
 * @param [type] $type
 * @return void
 */
function fgroup( $name, $label, $placeholder, $type = 'text' ) {
    
    // Imprime o input
    return "<div class=\"form-group\">
                <label class=\"form-label ".__e( $name, 'text-danger' )."\">$label</label>
                <input  type=\"$type\" 
                        value=\"".old( '$name' )."\"
                        name=\"$name\"
                        id=\"$name\"
                        class=\"form-control ".__e( $name, 'is-invalid' )."\" 
                        placeholder=\"$placeholder\">
                ".__bte( $name )."
            </div>";
}

/**
 * Imprime um campo de email
 *
 * @param [type] $name
 * @param [type] $label
 * @param [type] $placeholder
 * @return void
 */
function femail( $name, $label, $placeholder ) {
    return fgroup( $name, $lavel, $placeholder, 'email' );
}

/**
 * Imprime um campo de numero
 *
 * @param [type] $name
 * @param [type] $label
 * @param [type] $placeholder
 * @return void
 */
function fnumber( $name, $label, $placeholder ) {
    return fgroup( $name, $lavel, $placeholder, 'email' );
}

/**
 * Imprime um campo de senha
 *
 * @param [type] $name
 * @param [type] $label
 * @param [type] $placeholder
 * @return void
 */
function fpassword( $name, $label, $placeholder ) {
    return fgroup( $name, $label, $placeholder, 'password' );
}

// End of file