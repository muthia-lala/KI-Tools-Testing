<?php

/**
 * Instructions
 *
 * Take a nested list and return a single flattened list with all values except nil/null.
 *
 * The challenge is to write a function that accepts an arbitrarily-deep nested list-like structure and returns a flattened structure without any nil/null values.
 *
 * For Example
 *
 * input: [1,[2,3,null,4],[null],5]
 *
 * output: [1,2,3,4,5]
 *
 * @param array $input
 * @return array
 */

function flatten(array $input): array
{
	$result = [];

	array_walk_recursive($input, function ($value) use (&$result)
	{
		if ($value !== null)
		{
			$result[] = $value;
		}
	});

	return $result;
}
