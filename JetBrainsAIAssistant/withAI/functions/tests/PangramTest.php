<?php

class PangramTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../Pangram.php';
    }

    public function testSentenceEmpty(): void
    {
        $this->assertFalse(isPangram(''));
    }

    public function testPerfectLowerCase(): void
    {
        $this->assertTrue(isPangram('abcdefghijklmnopqrstuvwxyz'));
    }

    public function testPangramWithOnlyLowerCase(): void
    {
        $this->assertTrue(isPangram('the quick brown fox jumps over the lazy dog'));
    }

    public function testMissingCharacterX(): void
    {
        $this->assertFalse(isPangram('a quick movement of the enemy will jeopardize five gunboats'));
    }

    public function testMissingCharacterH(): void
    {
        $this->assertFalse(isPangram('five boxing wizards jump quickly at it'));
    }

    public function testPangramWithUnderscores(): void
    {
        $this->assertTrue(isPangram('the_quick_brown_fox_jumps_over_the_lazy_dog'));
    }

    public function testPangramWithNumbers(): void
    {
        $this->assertTrue(isPangram('the 1 quick brown fox jumps over the 2 lazy dogs'));
    }

    public function testMissingLettersReplacedByNumbers(): void
    {
        $this->assertFalse(isPangram('7h3 qu1ck brown fox jumps ov3r 7h3 lazy dog'));
    }

    public function testPangramWithMixedCaseAndPunctuation(): void
    {
        $this->assertTrue(isPangram('"Five quacking Zephyrs jolt my wax bed."'));
    }

    public function testEnoughDifferentCharsButOnlyCaseDiffers(): void
    {
        $this->assertFalse(isPangram('abcdefghijklm ABCDEFGHIJKLM'));
    }

    public function testPangramMixedWithUnicode(): void
    {
        $this->assertTrue(isPangram('Victor jagt zwölf Boxkämpfer quer über den großen Sylter Deich.'));
    }
}
