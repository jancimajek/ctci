<?php

namespace Janci\Ctci\DataStructures;


class Queue
{
    private $queue;

    public function __construct() {
        $this->queue = [];
    }

    public function enqueue($data) {
        $this->queue[] = $data;
    }

    public function isEmpty() {
        return (count($this->queue) === 0);
    }

    public function peak() {
        return $this->isEmpty() ? null : reset($this->queue);
    }

    public function dequeue() {
        if ($this->isEmpty()) return null;

        $first = reset($this->queue);
        unset($this->queue[key($this->queue)]);

        return $first;
    }

    public function __toString() {
        return '[' . implode(', ', $this->queue) . ']';
    }
}