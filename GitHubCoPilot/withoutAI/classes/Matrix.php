<?php

/**
 * Instructions
 *
 * Given a string representing a matrix of numbers, return the rows and columns of that matrix.
 *
 * So given a string with embedded newlines like:
 *
 * 9 8 7
 * 5 3 2
 * 6 6 7
 *
 * representing this matrix:
 *
 * 1  2  3
 * |---------
 * 1 | 9  8  7
 * 2 | 5  3  2
 * 3 | 6  6  7
 *
 * your code should be able to spit out:
 *
 * A list of the rows, reading each row left-to-right while moving top-to-bottom across the rows,
 * A list of the columns, reading each column top-to-bottom while moving from left-to-right.
 *
 * The rows for our example matrix:
 *
 * 9, 8, 7
 * 5, 3, 2
 * 6, 6, 7
 *
 * And its columns:
 *
 * 9, 5, 6
 * 8, 3, 6
 * 7, 2, 7
 */

class Matrix
{
    public function __construct(string $matrix)
    {
        throw new BadFunctionCallException("Please implement the Matrix class!");
    }

    public function getRow(int $rowId): array
    {
        throw new BadFunctionCallException("Please implement the getRow method!");
    }

    public function getColumn(int $columnId): array
    {
        throw new BadFunctionCallException("Please implement the getColumn method!");
    }
}