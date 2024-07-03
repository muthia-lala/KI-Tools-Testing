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
    private $matrix = [[]];

    public function __construct(string $matrix)
    {
        $totalRows = $matrix;

        if (strpos($matrix, "\n") !== false) {
            $totalRows = explode("\n", $matrix);
        }

        if (! strpos($matrix, " ")) {
            $this->matrix[0] = [$matrix];
            return;
        }

        $column = 0;
        $row = 0;

        foreach ($totalRows as $currentRow) {
            $currentRow = str_replace(',', ' ', $currentRow);
            $currentRow = explode(" ", $currentRow);

            foreach ($currentRow as $item) {
                $this->matrix[$row][$column] = trim($item);
                $column++;
            }

            $row++;
            $column = 0;
        }
    }

    public function getRow(int $rowId): array
    {
        if (! isset($this->matrix[$rowId -1])) {
            throw new OutOfRangeException("rowId out of range.");
        }

        return $this->matrix[$rowId - 1];
    }

    public function getColumn(int $columnId): array
    {
        return array_map(function($array) use ($columnId) {
            if (! isset($array[$columnId - 1])) {
                throw new OutOfRangeException("columnId out of range.");
            }
            return $array[$columnId - 1];
        }, $this->matrix);
    }
}
