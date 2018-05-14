<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueIfChanged implements Rule {

    /**
     * Model utilizada
     *
     * @var [type]
     */
    protected $_model;

    /**
     * Campo a ser buscado
     *
     * @var [type]
     */
    protected $_field;

    /**
     * Model original
     *
     * @var [type]
     */
    protected $_original;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct( $model, $field, $route ) {
        $this->_model    = $model;
        $this->_field    = $field;
        $this->_original = request()->route($route);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        
        // Obtem a model
        $entity = $this->_model::where( $this->_field, $value )->first();
        if ( !$entity ) return true;

        // Verifica se o id da entidade encontrada é iguala do original
        if ( $this->_original->id == $entity->id ) return true;
        
        // Volta false por padrao
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'Esse :attribute já está em uso.';
    }
}

// End of file
