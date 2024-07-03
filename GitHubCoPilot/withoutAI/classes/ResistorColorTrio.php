<?php

/**
 * Instructions
 *
 * If you want to build something using a Raspberry Pi, you'll probably use resistors. For this exercise, you need to know only three things about them:
 *
 * Each resistor has a resistance value.
 *
 * Resistors are small - so small in fact that if you printed the resistance value on them, it would be hard to read. To get around this problem, manufacturers print color-coded bands onto the resistors to denote their resistance values.
 *
 * Each band acts as a digit of a number. For example, if they printed a brown band (value 1) followed by a green band (value 5), it would translate to the number 15. In this exercise, you are going to create a helpful program so that you don't have to remember the values of the bands. The program will take 3 colors as input, and outputs the correct value, in ohms. The color bands are encoded as follows:
 *
 * Black: 0
 *
 * Brown: 1
 *
 * Red: 2
 *
 * Orange: 3
 *
 * Yellow: 4
 *
 * Green: 5
 *
 * Blue: 6
 *
 * Violet: 7
 *
 * Grey: 8
 *
 * White: 9
 *
 * In resistor-color duo you decoded the first two colors. For instance: orange-orange got the main value 33. The third color stands for how many zeros need to be added to the main value. The main value plus the zeros gives us a value in ohms. For the exercise it doesn't matter what ohms really are. For example:
 *
 * orange-orange-black would be 33 and no zeros, which becomes 33 ohms.
 * orange-orange-red would be 33 and 2 zeros, which becomes 3300 ohms.
 * orange-orange-orange would be 33 and 3 zeros, which becomes 33000 ohms.
 *
 * (If Math is your thing, you may want to think of the zeros as exponents of 10. If Math is not your thing, go with the zeros. It really is the same thing, just in plain English instead of Math lingo.)
 *
 * This exercise is about translating the colors into a label:
 *
 * "... ohms"
 *
 * So an input of "orange", "orange", "black" should return:
 *
 * "33 ohms"
 *
 * When we get to larger resistors, a metric prefix is used to indicate a larger magnitude of ohms, such as "kiloohms". That is similar to saying "2 kilometers" instead of "2000 meters", or "2 kilograms" for "2000 grams". For example, an input of "orange", "orange", "orange" should return:
 *
 * "33 kiloohms"
 */

class ResistorColorTrio
{
	private $colors = [
		'black' => 0,
		'brown' => 1,
		'red' => 2,
		'orange' => 3,
		'yellow' => 4,
		'green' => 5,
		'blue' => 6,
		'violet' => 7,
		'grey' => 8,
		'white' => 9
	];

	public function label(array $colors): string
	{
		if (count($colors) < 3) {
			throw new InvalidArgumentException("At least two colors and a ohm values are required");
		}

		$lastKey = array_key_last($colors);
		$result = 0;
		for ($i = 0; $i < count($colors); $i++) {
			$color = $colors[$i];
			if (! array_key_exists($color, $this->colors)) {
				throw new InvalidArgumentException("Invalid color: $color");
			}
			if ($i === $lastKey) {
				$result .= str_repeat(0, $this->colors[$color]);
			} else {
				$result .= $this->colors[$color];
			}
		}

		return $this->convertOhms((int)$result);
	}

	private function convertOhms($ohms)
	{
		$kiloohms = 1000;
		$megaohms = 1000000;
		$gigaohms = 1000000000;

		if ($ohms >= $gigaohms) {
			$value = $ohms / $gigaohms;
			$unit = "gigaohms";
		} elseif ($ohms >= $megaohms) {
			$value = $ohms / $megaohms;
			$unit = "megaohms";
		} elseif ($ohms >= $kiloohms) {
			$value = $ohms / $kiloohms;
			$unit = "kiloohms";
		} else {
			return $ohms." ohms";
		}

		return $value." ".$unit;
	}
}