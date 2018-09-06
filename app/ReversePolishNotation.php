<?php

namespace App;

use App\AddOperation;
use App\OperandStack;
use SubtractOperation;
use App\BinaryOperation;
use App\DivideOperation;
use App\MultiplyOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReversePolishNotation
{
    private $accumulator;
    public function __construct()
    {
        $this->stackOperator = new OperandStack;
    }

    public function setAccumulatorValue($number = 0){
        $this->accumulator = $number;
    }

    public function getAccumulatorValue(){
        return $this->accumulator;
    }

    public function enter($number){
        $this->stackOperator->push($number);
    }

    public function peek(){
        return $this->stackOperator->peek();
    }

    public function performOperation($operand){
        switch($operand){
            case '+':
                $operation = new AddOperation;
                break;
            case '-':
                $operation = new SubtractOperation;
                break;
            case '/':
                $operation = new DivideOperation;
                break;
            case '*':
                $operation = new MultiplyOperation;
                break;
        }
        $operation->apply($this->stackOperator);
        return $this->stackOperator->peek();
    }

    // public function add(){
    //     $value1 = $this->stackOperator->pop();
    //     $value2 = $this->stackOperator->peek();
    //     $result = $value1 + $value2;
    //     $this->stackOperator->replaceTop($result);
    //     return $result;
    // }

    // public function subtract(){
    //     $value1 = $this->stackOperator->pop();
    //     $value2 = $this->stackOperator->peek();
    //     $result = $value2 - $value1;
    //     $this->stackOperator->replaceTop($result);
    //     return $result;
    // }
}

