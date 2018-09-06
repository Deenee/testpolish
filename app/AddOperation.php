<?php

namespace App;

class AddOperation extends BinaryOperation
{
    public function perform($value1, $value2){
        return $value2 + $value1;
    }
}

