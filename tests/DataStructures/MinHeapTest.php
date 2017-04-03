<?php

namespace DataStructures;

use Janci\Ctci\DataStructures\MinHeap;
use PHPUnit\Framework\TestCase;

class MinHeapTest extends TestCase
{
    public function testMinHeap()
    {
        $h = new MinHeap();

        $this->assertEquals([], $h->__toArray());
        $this->assertNull($h->peek());
        $this->assertNull($h->remove());

        $addMap = [
            [5, [5]],
            [8, [5, 8]],
            [3, [3, 8, 5]],
            [3, [3, 3, 5, 8]],
            [6, [3, 3, 5, 8, 6]],
            [9, [3, 3, 5, 8, 6, 9]],
            [4, [3, 3, 4, 8, 6, 9, 5]],
            [1, [1, 3, 4, 3, 6, 9, 5, 8]],
            [5, [1, 3, 4, 3, 6, 9, 5, 8, 5]],
        ];

        $removeMap = [
            [1, [3, 3, 4, 5, 6, 9, 5, 8]],
            [3, [3, 5, 4, 8, 6, 9, 5]],
            [3, [4, 5, 5, 8, 6, 9]],
            [4, [5, 6, 5, 8, 9]],
            [5, [5, 6, 9, 8]],
            [5, [6, 8, 9]],
            [6, [8, 9]],
            [8, [9]],
            [9, []],
            [null, []],
        ];

        foreach ($addMap as list($element, $expectedHeap)) {
            $h->add($element);
            $this->assertEquals($expectedHeap, $h->__toArray());
        }

        foreach ($removeMap as list($element, $expectedHeap)) {
            $this->assertEquals($element, $h->peek());
            $this->assertEquals($element, $h->remove());
            $this->assertEquals($expectedHeap, $h->__toArray());
        }
    }
}


/**
$heap = new MinHeap();
echo $heap . PHP_EOL;

$heap->add(5);
echo $heap . PHP_EOL;

$heap->add(8);
echo $heap . PHP_EOL;

$heap->add(3);
echo $heap . PHP_EOL;

$heap->add(3);
echo $heap . PHP_EOL;

$heap->add(6);
echo $heap . PHP_EOL;

$heap->add(9);
echo $heap . PHP_EOL;

$heap->add(4);
echo $heap . PHP_EOL;

$heap->add(1);
echo $heap . PHP_EOL;

$heap->add(5);
echo $heap . PHP_EOL;

echo $heap->peek() . PHP_EOL;
echo $heap->remove() . PHP_EOL;

echo $heap . PHP_EOL;

//var_dump($heap);
$heap->add(1);
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;

echo $heap->remove() . PHP_EOL;
echo $heap . PHP_EOL;
**/