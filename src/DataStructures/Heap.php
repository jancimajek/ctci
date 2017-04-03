<?php
/**
 * Created by PhpStorm.
 * User: jan.majek
 * Date: 03/04/2017
 * Time: 15:47
 */

namespace Janci\Ctci\DataStructures;


class Heap {
	/**
	 * @var array
	 */
	protected $heap = [];

    /**
     * @var \Closure
     */
	protected $compareFunc;

	public function __construct(callable $compareFunc) {
	    $this->compareFunc = $compareFunc;
    }

    public function add($data) {

		// First element
		if (!isset($this->heap[1])) {
			$this->heap[1] = $data;
			return;
		}

		$this->heap[count($this->heap) + 1] = $data;

		$this->bubbleUp();
	}

	public function peek() {
		return isset($this->heap[1]) ? $this->heap[1] : null;
	}

	public function remove() {
		// Heap is empty
		if (!isset($this->heap[1])) {
			return null;
		}

		$ret = $this->peek();

		$last = count($this->heap);
		$this->heap[1] = $this->heap[$last];

		unset($this->heap[$last]);

		$this->bubbleDown();

		return $ret;
	}

	protected function bubbleUp() {
		$node = count($this->heap);
		$parent = floor($node / 2);

		while ($parent > 0 && $this->compareFunc->__invoke($this->heap[$node], $this->heap[$parent])) {
			$this->swap($node, $parent);
			$node = $parent;
			$parent = floor($node / 2);
		}
	}

	protected function bubbleDown() {
		$last = count($this->heap);

		$node = 1;
		$left = $node * 2;
		$right = $node * 2 + 1;

		while ($left <= $last) {
			$minChild = ($right > $last || $this->compareFunc->__invoke($this->heap[$left], $this->heap[$right])) ? $left : $right;

			if ($this->compareFunc->__invoke($this->heap[$node], $this->heap[$minChild])) {
				break;
			}

			$this->swap($node, $minChild);

			$node = $minChild;
			$left = $node * 2;
			$right = $node * 2 + 1;
		}
	}

	protected function swap($i, $j) {
		$tmp = $this->heap[$i];
		$this->heap[$i] = $this->heap[$j];
		$this->heap[$j] = $tmp;
	}

	public function __toString()
	{
		$levels = [];

		for ($i = 1; $i < count($this->heap) + 1; $i++) {
			$lvl = floor(log($i, 2));

			if (!isset($levels[$lvl])) $levels[$lvl] = [];

			$levels[$lvl][] = $this->heap[$i];
		}

		$ret = '[' . implode(', ', $this->heap) . ']' . PHP_EOL;
		foreach ($levels as $level) {
			$ret .= '[' . implode(', ', $level) . ']' . PHP_EOL;
		}

		return $ret;
	}

	public function __toArray() {
	    // Merging with empty array will reset keys from 0;
	    return array_merge([], $this->heap);
    }
}
