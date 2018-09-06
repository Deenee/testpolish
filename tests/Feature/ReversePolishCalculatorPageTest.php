<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReversePolishCalculatorPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function when_CalculatorPageIsVisited_then_ExpectCalculatorGUI()
    {
        //Given

        //When
        $response = $this->get('/calculator');

        //Then
        $value = 'Reverse Polish Calculator';
        $response->assertSeeText($value);
    }
}
