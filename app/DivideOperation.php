<?php

namespace App;

class DivideOperation extends BinaryOperation
{
    public function perform($value1, $value2){
        return $value2 / $value1;
    }
}
