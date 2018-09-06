<?php

namespace App;

interface Operation
{
    public function apply(OperandStack $stack);
}
