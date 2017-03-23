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

        // Fill in with 1..100
        for ($i = 0; $i < 100; $i++) {
            $q->enqueue($i);
            $this->assertEquals((string)$q, '[' . implode(', ', range(0, $i)) . ']');
        }

        // Empty half
        for ($i = 0; $i < 50; $i++) {
            $this->assertEquals((string)$q, '[' . implode(', ', range($i, 99)) . ']');
            $this->assertEquals($q->peak(), $i);
            $this->assertEquals($q->dequeue(), $i);
        }

        // Add another 50
        for ($i = 100; $i < 150; $i++) {
            $q->enqueue($i);
            $this->assertEquals((string)$q, '[' . implode(', ', range(50, $i)) . ']');
        }

        // Empty completely
        for ($i = 50; $i < 150; $i++) {
            $this->assertEquals((string)$q, '[' . implode(', ', range($i, 149)) . ']');
            $this->assertEquals($q->peak(), $i);
            $this->assertEquals($q->dequeue(), $i);
        }

        $this->assertEquals((string)$q, '[]');
        $this->assertNull($q->dequeue());
        $this->assertNull($q->peak());
    }
}
