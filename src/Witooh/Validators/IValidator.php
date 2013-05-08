<?php

namespace Witooh\Validators;

use Illuminate\Support\Facades\Validator;

abstract class IValidator {

    protected $attributes;
    protected $rule;
    public $errors;

    function __construct($attributes){
        $this->attributes = $attributes;
        $this->errors = null;
        $this->registerCustomValidators();
    }

    public function passes(){
        $validator = Validator::make($this->attributes, $this->rule);

        if($validator->passes()) return true;

        $this->errors = $validator->messages();

        return false;
    }

    public function fails(){
        $validator = Validator::make($this->attributes, $this->rule);

        if($validator->passes()) return false;

        $this->errors = $validator->messages();

        return true;
    }

    protected function registerCustomValidators(){

    }

    public function getRule()
    {
        return $this->rule;
    }

    public function getErrors()
    {
        return $this->errors;
    }

}