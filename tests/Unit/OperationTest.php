<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\ReversePolishNotation;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OperationTest extends TestCase
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
        $this->value1 = 25;
        $this->value2 = 5;

        //Push numbers to stack
        $this->calculator->setAccumulatorValue($this->value1);
        $this->calculator->enter($this->calculator->getAccumulatorValue());
        $this->calculator->setAccumulatorValue($this->value2);
        $this->calculator->enter($this->calculator->getAccumulatorValue());
    }

    /** @test */
    public function when_AdditionPerformed_Expect_SumOfOperands(){
        //Given
        $actual = $this->calculator->performOperation('+');
        //When
        $expected = 30;
        //Then
        $this->assertEquals($expected, $actual);
    }


    public function when_SubtractionPerformed_Expect_DifferenceOfOperands(){
        //Given
        $actual = $this->calculator->performOperation('-');
        //When
        $expected = -20;
        //Then
        $this->assertEquals($expected, $actual);
    }

    public function when_DivisionPerformed_Expect_DivisionOfOperands(){
        //Given
        $actual = $this->calculator->performOperation('/');
        //When
        $expected = 1/5;
        //Then
        $this->assertEquals($expected, $actual);
    }

    public function when_MultiplicationPerformed_Expect_MultiplicationOfOperands(){
        //Given
        $actual = $this->calculator->performOperation('*');
        //When
        $expected = 125;
        //Then
        $this->assertEquals($expected, $actual);
    }
}
