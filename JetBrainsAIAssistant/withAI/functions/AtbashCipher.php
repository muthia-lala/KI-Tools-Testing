<?php

/**
 * Instructions
 *
 * Create an implementation of the atbash cipher, an ancient encryption system created in the Middle East.
 *
 * The Atbash cipher is a simple substitution cipher that relies on transposing all the letters in the alphabet such that the resulting alphabet is backwards.
 * The first letter is replaced with the last letter, the second with the second-last, and so on.
 *
 * An Atbash cipher for the Latin alphabet would be as follows:
 *
 * Plain:  abcdefghijklmnopqrstuvwxyz
 * Cipher: zyxwvutsrqponmlkjihgfedcba
 *
 * It is a very weak cipher because it only has one possible key, and it is a simple monoalphabetic substitution cipher.
 * However, this may not have been an issue in the cipher's time.
 *
 * Ciphertext is written out in groups of fixed length, the traditional group size being 5 letters, and punctuation is excluded.
 * This is to make it harder to guess things based on word boundaries.
 * Examples
 *
 * Encoding test gives gvhg
 * Decoding gvhg gives test
 * Decoding gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt gives thequickbrownfoxjumpsoverthelazydog
 *
 * @param string $text
 * @return string
 */

function encode($text): string
{
	// Define a mapping for each letter to its reverse counterpart
	$mapping = [
		'a' => 'z', 'b' => 'y', 'c' => 'x', 'd' => 'w', 'e' => 'v', 'f' => 'u', 'g' => 't',
		'h' => 's', 'i' => 'r', 'j' => 'q', 'k' => 'p', 'l' => 'o', 'm' => 'n', 'n' => 'm',
		'o' => 'l', 'p' => 'k', 'q' => 'j', 'r' => 'i', 's' => 'h', 't' => 'g', 'u' => 'f',
		'v' => 'e', 'w' => 'd', 'x' => 'c', 'y' => 'b', 'z' => 'a',
	];

	// Keep numbers and remove punctuation from the text
	$text = preg_replace("/[^a-zA-Z0-9]/", "", $text);

	// Transpose each character in $text according to Atbash cipher, preserve the numbers
	$output = strtr(strtolower($text), $mapping);

	// Break output into groups of exactly 5 characters and join them with a space
	$output = trim(chunk_split($output, 5, ' '));
	return $output;
}
