<?php

namespace Janci\Ctci\DataStructures;

class BinaryTree {
    /**
     * @var BinaryTreeNode
     */
	protected $root;

	public function add($data) {
		if ($this->isEmpty()) $this->setRoot($data);
		else $this->getRoot()->add($data);
	}

	/**
	 * @return BinaryTreeNode
	 */
	public function getRoot() {
		return $this->root;
	}

	public function setRoot($data) {
		$this->root = new BinaryTreeNode($data);
	}

	/**
	 * @return bool
	 */
	public function isEmpty() {
		return ($this->root === null);
	}

	/**
	 * @return array|null
	 */
	public function breadthFirstTraversal() {
        if ($this->isEmpty()) return [];

	    $queue = new Queue();
        $queue->enqueue($this->getRoot());

        $ret = [];
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            if ($node !== null) $ret[] = $node->breadthFirstTraversal($queue);
        }

        return $ret;
    }

	public function __toString() {
		return json_encode($this->getRoot()->toArray(), JSON_PRETTY_PRINT);
	}
}
