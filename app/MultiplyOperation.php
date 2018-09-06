<?php

namespace App;

class MultiplyOperation extends BinaryOperation
{
    public function perform($value1, $value2){
        return $value2 * $value1;
    }
}
