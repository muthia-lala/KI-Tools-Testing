<?php

class DifferenceOfSquaresTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../DifferenceOfSquares.php';
    }

    public function testSquareOfSumTo1(): void
    {
        $this->assertEquals(1, squareOfSum(1));
    }

    public function testSquareOfSumTo5(): void
    {
        $this->assertEquals(225, squareOfSum(5));
    }

    public function testSquareOfSumTo100(): void
    {
        $this->assertEquals(25502500, squareOfSum(100));
    }

    public function testSumOfSquaresTo1(): void
    {
        $this->assertEquals(1, sumOfSquares(1));
    }

    public function testSumOfSquaresTo5(): void
    {
        $this->assertEquals(55, sumOfSquares(5));
    }

    public function testSumOfSquaresTo100(): void
    {
        $this->assertEquals(338350, sumOfSquares(100));
    }

    public function testDifferenceOfSumTo1(): void
    {
        $this->assertEquals(0, difference(1));
    }

    public function testDifferenceOfSumTo5(): void
    {
        $this->assertEquals(170, difference(5));
    }

    public function testDifferenceOfSumTo100(): void
    {
        $this->assertEquals(25164150, difference(100));
    }
}
