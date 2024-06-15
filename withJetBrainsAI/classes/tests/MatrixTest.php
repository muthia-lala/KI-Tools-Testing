<?php

class MatrixTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../Matrix.php';
    }

    public function testExtractRowFromOneNumberMatrix(): void
    {
        $matrix = new Matrix("1");
        $this->assertEquals([1], $matrix->getRow(1));
    }

    public function testExtractRow(): void
    {
        $matrix = new Matrix("1 2\n3 4");
        $this->assertEquals([3, 4], $matrix->getRow(2));
    }

    public function testExtractRowWhereNumbersHaveDifferentWidths(): void
    {
        $matrix = new Matrix("1, 2\n10 20");
        $this->assertEquals([10, 20], $matrix->getRow(2));
    }

    public function testExtractRowFromNonSquareMatrixWithNoMatchingColumn(): void
    {
        $matrix = new Matrix("1 2 3\n4 5 6\n7 8 9\n8 7 6");
        $this->assertEquals([8, 7, 6], $matrix->getRow(4));
    }

    public function testExtractColumnFromOneNumberMatrix(): void
    {
        $matrix = new Matrix("1");
        $this->assertEquals([1], $matrix->getColumn(1));
    }

    public function testExtractColumn(): void
    {
        $matrix = new Matrix("1 2 3\n4 5 6\n7 8 9");
        $this->assertEquals([3, 6, 9], $matrix->getColumn(3));
    }

    public function testExtractColumnFromNonSquareMatrixWithNoMatchRow(): void
    {
        $matrix = new Matrix("1 2 3 4\n5 6 7 8\n9 8 7 6");
        $this->assertEquals([4, 8, 6], $matrix->getColumn(4));
    }

    public function testExtractColumnWhenNumbersHaveDifferentWidths(): void
    {
        $matrix = new Matrix("89 1903 3\n18 3 1\n9 41 800");
        $this->assertEquals([1903, 3, 41], $matrix->getColumn(2));
    }
}