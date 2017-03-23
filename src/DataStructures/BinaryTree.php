<?php

namespace Janci\Ctci\DataStructures;

class BinaryTree {
    /**
     * @var BinaryTreeNode
     */
	private $root;

	public function add($data) {
		if ($this->root === null) $this->root = new BinaryTreeNode($data);
		else $this->root->add($data);
	}

	public function getRoot() {
		return $this->root;
	}

	public function __toString() {
		return json_encode($this->getRoot()->toArray(), JSON_PRETTY_PRINT);
	}
}
