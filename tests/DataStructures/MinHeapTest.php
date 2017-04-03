<?php

namespace DataStructures;

use Janci\Ctci\DataStructures\MinHeap;
use PHPUnit\Framework\TestCase;

class MinHeapTest extends TestCase
{
    public function testMinHeap() {
        $h = new MinHeap();

        $this->assertEquals('[]' . PHP_EOL, (string)$h);
        $this->assertNull($h->peek());
        $this->assertNull($h->remove());

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