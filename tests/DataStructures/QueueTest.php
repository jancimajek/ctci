<?php

namespace DataStructures;

use Janci\Ctci\DataStructures\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function testQueue() {
        $q = new Queue();

        $this->assertEquals('[]', (string)$q);
        $this->assertNull($q->dequeue());
        $this->assertNull($q->peak());

        // Fill in with 1..10
        for ($i = 0; $i < 10; $i++) {
            $q->enqueue($i);
            $this->assertEquals(
            	'[' . implode(', ', range(0, $i)) . ']',
				(string)$q
			);
        }

        // Empty half
        for ($i = 0; $i < 5; $i++) {
            $this->assertEquals(
            	'[' . implode(', ', range($i, 9)) . ']',
				(string)$q
			);
            $this->assertEquals($i, $q->peak());
            $this->assertEquals($i, $q->dequeue());
        }

        // Add another 5
        for ($i = 10; $i < 15; $i++) {
            $q->enqueue($i);
            $this->assertEquals(
            	'[' . implode(', ', range(5, $i)) . ']',
				(string)$q
			);
        }

        // Empty completely
        for ($i = 5; $i < 15; $i++) {
            $this->assertEquals(
            	'[' . implode(', ', range($i, 14)) . ']',
				(string)$q
			);
            $this->assertEquals($i, $q->peak());
            $this->assertEquals($i, $q->dequeue());
        }

        $this->assertEquals('[]', (string)$q);
        $this->assertNull($q->dequeue());
        $this->assertNull($q->peak());
    }
}
