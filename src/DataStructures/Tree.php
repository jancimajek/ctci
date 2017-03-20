<?php

namespace Janci\Ctci\DataStructures;

class Tree {
	private $root;

	public function __construct($data) {
		$this->root = new TreeNode($data);
	}

	public function getRoot() {
		return $this->root;
	}

	public function __toString() {
		return $root->__toString();
	}
}

function test() {
}

test();
