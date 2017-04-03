<?php

namespace Janci\Ctci\DataStructures;

class MinHeap extends Heap {
    public function __construct() {
        parent::__construct(
            function($a, $b) { return $a <= $b; }
        );
    }
}