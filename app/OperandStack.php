<?php

namespace App;

use App\Stack;

class OperandStack
{
    protected $stack;
    protected $limit;

    public function __construct() {
        $this->stack = new Stack;
    }

    public function sizeOfStack(){
        return sizeof($this->stack);
    }

    public function peek(){
        return $this->stack->top();
    }

    public function isEmpty() {
        return empty($this->stack);
    }

    public function stack() {
        return $this->stack->stack();
    }

    public function pop() {
        return $this->stack->pop();
    }

    public function push($value) {
        $this->stack->push($value);
    }

    public function replaceTop($item){
        $this->pop();
        $this->push($item);
    }
}
