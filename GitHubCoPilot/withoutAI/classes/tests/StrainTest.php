<?php

class StrainTest extends PHPUnit\Framework\TestCase
{
    private Strain $strain;

    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../Strain.php';
    }

    public function setUp(): void
    {
        $this->strain = new Strain();
    }

    public function testKeepOnEmptyListReturnsEmptyList(): void
    {
        $list = [];
        $predicate = function ($x) {
            return true;
        };

        $this->assertEquals([], $this->strain->keep($list, $predicate));
    }

    public function testKeepsEverything(): void
    {
        $list = [1, 3, 5];
        $predicate = function ($x) {
            return true;
        };

        $this->assertEquals([1, 3, 5], $this->strain->keep($list, $predicate));
    }

    public function testKeepNothing(): void
    {
        $list = [1, 3, 5];
        $predicate = function ($x) {
            return false;
        };

        $this->assertEquals([], $this->strain->keep($list, $predicate));
    }

    public function testKeepFirstAndLast(): void
    {
        $list = [1, 2, 3];
        $predicate = function ($x) {
            return $x % 2 === 1;
        };

        $this->assertEquals([1, 3], $this->strain->keep($list, $predicate));
    }

    public function testKeepNeitherFirstNorLast(): void
    {
        $list = [1, 2, 3];
        $predicate = function ($x) {
            return $x % 2 === 0;
        };

        $this->assertEquals([2], $this->strain->keep($list, $predicate));
    }

    public function testKeepStrings(): void
    {
        $list = ["apple", "zebra", "banana", "zombies", "cherimoya", "zealot"];
        $predicate = function ($x) {
            return str_starts_with($x, 'z');
        };

        $this->assertEquals(["zebra", "zombies", "zealot"], $this->strain->keep($list, $predicate));
    }

    public function testKeepsLists(): void
    {
        $list = [
            [1, 2, 3],
            [5, 5, 5],
            [5, 1, 2],
            [2, 1, 2],
            [1, 5, 2],
            [2, 2, 1],
            [1, 2, 5]
        ];

        $predicate = function ($x) {
            return in_array(5, $x, true);
        };

        $expected = [
            [5, 5, 5],
            [5, 1, 2],
            [1, 5, 2],
            [1, 2, 5]
        ];

        $this->assertEquals($expected, $this->strain->keep($list, $predicate));
    }

    public function testDiscardOnEmptyListReturnsEmptyList(): void
    {
        $list = [];
        $predicate = function ($x) {
            return true;
        };

        $this->assertEquals([], $this->strain->discard($list, $predicate));
    }

    public function testDiscardEverything(): void
    {
        $list = [1, 3, 5];
        $predicate = function ($x) {
            return true;
        };

        $this->assertEquals([], $this->strain->discard($list, $predicate));
    }

    public function testDiscardNothing(): void
    {
        $list = [1, 3, 5];
        $predicate = function ($x) {
            return false;
        };

        $this->assertEquals([1, 3, 5], $this->strain->discard($list, $predicate));
    }

    public function testDiscardFirstAndLast(): void
    {
        $list = [1, 2, 3];
        $predicate = function ($x) {
            return $x % 2 === 1;
        };

        $this->assertEquals([2], $this->strain->discard($list, $predicate));
    }

    public function testDiscardNeitherFirstNorLast(): void
    {
        $list = [1, 2, 3];
        $predicate = function ($x) {
            return $x % 2 === 0;
        };

        $this->assertEquals([1,3], $this->strain->discard($list, $predicate));
    }

    public function testDiscardStrings(): void
    {
        $list = ["apple", "zebra", "banana", "zombies", "cherimoya", "zealot"];
        $predicate = function ($x) {
            return str_starts_with($x, 'z');
        };

        $this->assertEquals(["apple", "banana", "cherimoya"], $this->strain->discard($list, $predicate));
    }

    public function testDiscardLists(): void
    {
        $list = [
            [1, 2, 3],
            [5, 5, 5],
            [5, 1, 2],
            [2, 1, 2],
            [1, 5, 2],
            [2, 2, 1],
            [1, 2, 5]
        ];

        $predicate = function ($x) {
            return in_array(5, $x, true);
        };

        $expected = [
            [1, 2, 3],
            [2, 1, 2],
            [2, 2, 1]
        ];

        $this->assertEquals($expected, $this->strain->discard($list, $predicate));
    }
}