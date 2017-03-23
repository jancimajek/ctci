<?php

namespace Janci\Ctci\DataStructures;

class BinaryTree {
    /**
     * @var BinaryTreeNode
     */
	private $root;

	public function add($data) {
		if ($this->isEmpty()) $this->setRoot(new BinaryTreeNode($data));
		else $this->getRoot()->add($data);
	}

	public function getRoot() {
		return $this->root;
	}

	public function setRoot(BinaryTreeNode $root = null) {
		$this->root = $root;
	}

	public function isEmpty() {
		return ($this->root === null);
	}

	public function breadthFirstTraversal() {
        if ($this->isEmpty()) return null;

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
