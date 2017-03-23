<?php

namespace DataStructures;

use Janci\Ctci\DataStructures\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function testQueue() {
        $q = new Queue();

        $this->assertEquals((string)$q, '[]');
        $this->assertNull($q->dequeue());
        $this->assertNull($q->peak());

        // Fill in with 1..10
        for ($i = 0; $i < 10; $i++) {
            $q->enqueue($i);
            $this->assertEquals((string)$q, '[' . implode(', ', range(0, $i)) . ']');
        }

        // Empty half
        for ($i = 0; $i < 5; $i++) {
            $this->assertEquals((string)$q, '[' . implode(', ', range($i, 9)) . ']');
            $this->assertEquals($q->peak(), $i);
            $this->assertEquals($q->dequeue(), $i);
        }

        // Add another 5
        for ($i = 10; $i < 15; $i++) {
            $q->enqueue($i);
            $this->assertEquals((string)$q, '[' . implode(', ', range(5, $i)) . ']');
        }

        // Empty completely
        for ($i = 5; $i < 15; $i++) {
            $this->assertEquals((string)$q, '[' . implode(', ', range($i, 14)) . ']');
            $this->assertEquals($q->peak(), $i);
            $this->assertEquals($q->dequeue(), $i);
        }

        $this->assertEquals((string)$q, '[]');
        $this->assertNull($q->dequeue());
        $this->assertNull($q->peak());
    }
}
