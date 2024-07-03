<?php

/**
 * The square of the sum of the first ten natural numbers is (1 + 2 + ... + 10)² = 55² = 3025.
 *
 * @param int $max
 * @return int
 */
function squareOfSum(int $max): int
{
	$sum = 0;
   for ($i = 1; $i <= $max; $i++) {
		$sum += $i;
	}
	return $sum ** 2;
}

/**
 * The sum of the squares of the first ten natural numbers is 1² + 2² + ... + 10² = 385.
 *
 * @param int $max
 * @return int
 */
function sumOfSquares(int $max): int
{
	$sum = 0;
   for ($i = 1; $i <= $max; $i++) {
		$sum += $i ** 2;
	}
	return $sum;
}

/**
 * Hence the difference between the square of the sum of the first ten natural numbers and the sum of the squares of the first ten natural numbers is 3025 - 385 = 2640.
 *
 * @param int $max
 * @return int
 */
function difference(int $max): int
{
	return squareOfSum($max) - sumOfSquares($max);
}