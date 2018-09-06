<?php

namespace App;
use App\Operation;
use App\OperandStack;

abstract class BinaryOperation implements Operation
{
    public function apply(OperandStack $operandStack){
        $value1 = $operandStack->pop();
        $value2 = $operandStack->peek();
        $operandStack->replaceTop($this->perform($value1,$value2));
        \Log::info('Final', [$operandStack->stack()]);
    }

    protected abstract function perform($value1,$value2);
}
