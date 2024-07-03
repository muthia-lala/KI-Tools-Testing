<?php

/**
 * Instructions
 *
 * Your task is to figure out if a sentence is a pangram.
 *
 * A pangram is a sentence using every letter of the alphabet at least once.
 *
 * The best known English pangram is:
 * The quick brown fox jumps over the lazy dog.
 *
 * It is case insensitive, so it doesn't matter if a letter is lower-case (e.g. k) or upper-case (e.g. K).
 *
 * For this exercise, a sentence is a pangram if it contains each of the 26 letters in the English alphabet.
 *
 * @param string $string
 * @return bool
 */

function isPangram(string $string): bool
{
    $string = strtolower($string);
    $chars = 'abcdefghijklmnopqrstuvwxyz';

    for ($i = 0; $i < strlen($chars); $i++) {
        if (! str_contains($string, $chars[$i])) {
            return false;
        }
    }

    return true;
}
