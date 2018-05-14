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
 * Imprime o inicio do select
 *
 * @param [type] $name
 * @param [type] $label
 * @return void
 */
function select( $name, $label ) {
    // Imprime o input
    return "<div class=\"form-group\">
                <label class=\"form-label ".__e( $name, 'text-danger' )."\">$label</label>
                <select name=\"$name\"
                        id=\"$name\"
                        class=\"form-control ".__e( $name, 'is-invalid' )."\">
                ";
}

/**
 * Imprime o fim do select
 *
 * @param [type] $name
 * @return void
 */
function endselect( $name ) {
    return __bte( $name )."</select></div>";
}

/**
 * Imprime a opcao do select
 *
 * @param [type] $value
 * @param [type] $placeholder
 * @param [type] $selected
 * @return void
 */
function option( $form, $name, $value, $placeholder, $type = 'text' ) {

    // Verifica se a opcao esta selecionada
    $selected = 'selected="selected"';

    // Obtem o valor do campo
    $sessionvalue = session()->get( $form, null );
    $sessionvalue = $sessionvalue ? $sessionvalue->$name : null;
    $inputValue   = old($name) ? old($name) : $sessionvalue;

    // Verifica se esta selecionado
    $selected =  $inputValue ? $selected : '';
        
    // Volta a opcao
    return "<option value='$value' $selected>$placeholder</option>";
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
function fgroup( $form, $name, $label, $placeholder, $type = 'text' ) {
    
    // Obtem o valor do campo
    $sessionvalue = session()->get( $form, null );
    $sessionvalue = $sessionvalue ? $sessionvalue->$name : null;
    $inputValue   = old($name) ? old($name) : $sessionvalue;

    // Imprime o input
    return "<div class=\"form-group\">
                <label class=\"form-label ".__e( $name, 'text-danger' )."\">$label</label>
                <input  type=\"$type\" 
                        value=\"".$inputValue."\"
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
function femail( $form,$name, $label, $placeholder ) {
    return fgroup( $form, $name, $label, $placeholder, 'email' );
}

/**
 * Imprime um campo de data
 *
 * @param [type] $name
 * @param [type] $label
 * @param [type] $placeholder
 * @return void
 */
function fdate( $form, $name, $label, $placeholder ) {
    return fgroup( $form, $name, $label, $placeholder, 'email' );
}

/**
 * Imprime um campo de numero
 *
 * @param [type] $name
 * @param [type] $label
 * @param [type] $placeholder
 * @return void
 */
function fnumber( $form,$name, $label, $placeholder ) {
    return fgroup( $form, $name, $label, $placeholder, 'number' );
}

/**
 * Imprime um campo de senha
 *
 * @param [type] $name
 * @param [type] $label
 * @param [type] $placeholder
 * @return void
 */
function fpassword( $form, $name, $label, $placeholder ) {
    return fgroup( $form, $name, $label, $placeholder, 'password' );
}

/**
 * Imprime o HTML de uma tag
 *
 * @param [type] $text
 * @param [type] $color
 * @return void
 */
function __tag( $text, $color ) {
    $html = "<span class='tag tag-%s'>%s</span>";
    return sprintf( $html, $color, $text );
}

// End of file