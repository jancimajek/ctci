<?php

namespace Janci\Ctci\DataStructures;

class BinaryTree {
	private $root;

	public function add($data) {
		if ($this->root === null) $this->root = new BinaryTreeNode($data);
		else $this->root->add($data);
	}

	public function getRoot() {
		return $this->root;
	}

	public function __toString() {
		return (string)$this->root;
	}
}

function test() {
    
	$bt = new BinaryTree();
	$bt->add(0);
	$bt->add(1);
	$bt->add(2);
	$bt->add(3);
	$bt->add(4);
	$bt->add(5);
	$bt->add(6);
	$bt->add(7);
	$bt->add(8);
	$bt->add(9);

	echo $bt . PHP_EOL;
}

test();
