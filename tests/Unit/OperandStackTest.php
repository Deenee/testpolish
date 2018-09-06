<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\OperandStack;

class OperandStackTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /**
     * Setup
    */

    private $stack, $value1, $value2, $value3;

    public function setUp(){
        //Override setup method
        parent::setUp();

        //Initialize OperandStack class
        $this->stack = new OperandStack;

        //Set default values
        $this->value1 = 10;
        $this->value2 = 20;
        $this->value3 = 30;
    }

    /** @test */
    public function when_NumberIsPushed_ThenAppendNumberToStack()
    {

        //When
        $this->stack->push($this->value1);
        $this->stack->push($this->value2);
        $this->stack->push($this->value3);
        $actual = $this->stack->peek();


        //Then
        $expected = $this->value3;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function when_StackIsPeeked_ThenReturnTopValueOfStack()
    {
        //Given
        $this->when_NumberIsPushed_ThenAppendNumberToStack();

        //When
        $actual = $this->stack->peek();

        //Then
        $expected = $this->value3;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function when_SinglePop_ThenRemoveValueFromStack()
    {
        //Given
        $this->when_NumberIsPushed_ThenAppendNumberToStack();

        //When
        $this->stack->pop();
        $actual = $this->stack->peek();

        //Then
        $expected = $this->value2;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function when_NewNumberIsAdded_ReplaceTopItem()
    {

        //Given
        $this->stack->push($this->value1);
        $this->stack->push($this->value2);
        $this->stack->push($this->value3);

        //When
        //Replace top number
        $this->stack->replaceTop(50);

        $actual = $this->stack->peek();
        $expected = 50;

        //Then
        $this->assertEquals($expected, $actual);

    }
}
