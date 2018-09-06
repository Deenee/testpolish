<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\ReversePolishNotation;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\OperandStack;


class ReversePolishNotationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    private $calculator, $value1, $value2, $value3;

    public function setUp(){
        //Override setup method
        parent::setUp();

        //Set new calculator
        $this->calculator = new ReversePolishNotation;

        //Set 3 values
        $this->value1 = 10;
        $this->value2 = 20;
        $this->value3 = 30;
    }

     /** @test */
     public function when_TheCalculatorIsNew_Then_SetAccumulatorValueToZero(){

        //Given
        $this->assertTrue(!is_null($this->calculator));

       //When
       $this->calculator->setAccumulatorValue(0);
       $actual = $this->calculator->getAccumulatorValue();
       $expected = 0;

       //Then
       $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function when_TheAccumulatorValueIsSet_Then_ExpectAccumulatorValue()
    {
       //Given
        $this->assertTrue(!is_null($this->calculator));

       //When
        $random = rand(1,10);
        $this->calculator->setAccumulatorValue($random);
        $actual = $this->calculator->getAccumulatorValue();
        $expected = $random;

       //Then
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function when_TheNumberIsEntered_Then_SetAccumulatorValueToNumberAndPushToStack()
    {
        //Given
        $this->assertTrue(!is_null($this->calculator));

       //When
        //First number
        $this->calculator->setAccumulatorValue($this->value1);
        $this->calculator->enter($this->calculator->getAccumulatorValue());

        //Second number
        $this->calculator->setAccumulatorValue($this->value2);
        $this->calculator->enter($this->calculator->getAccumulatorValue());

        //Third number
        $this->calculator->setAccumulatorValue($this->value3);
        $this->calculator->enter($this->calculator->getAccumulatorValue());

        $actual = $this->calculator->peek();
        $expected = $this->value3;

       //Then
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    // public function when_OperatorIsAddition_ExpectedResultToBeAdditionOfTwoNumbers(){
    //     //Given
    //     $this->assertTrue(!is_null($this->calculator));

    //    //When
    //     //First number
    //     $this->calculator->setAccumulatorValue($this->value1);
    //     $this->calculator->enter($this->calculator->getAccumulatorValue());

    //     //Second number
    //     $this->calculator->setAccumulatorValue($this->value2);
    //     $this->calculator->enter($this->calculator->getAccumulatorValue());

    //     //Third number
    //     $this->calculator->setAccumulatorValue($this->value3);
    //     $this->calculator->enter($this->calculator->getAccumulatorValue());

    //     $actual = $this->calculator->peek();
    //     $expected = $this->value3;

    //    //Then
    //     $this->assertEquals($expected, $actual);
    // }
}
