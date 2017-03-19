<?php

class BinaryTree {
	private $root;

	public function add($data) {
		if ($this->root === null) $this->root = new BinaryNode($data);
		else $this->root->add($data);
	}

	public function getRoot() {
		return $this->root;
	}

	public function __toString() {
		return (string)$this->root;
	}
}

class BinaryNode {
	private $data;
	private $left;
	private $right;

	public function __construct($data) {
		$this->setData($data);
	}

	public function add($data) {
		if (rand(0,1)) {
			if ($this->left === null) $this->left = new BinaryNode($data);
			else $this->left->add($data);
		} else {
			if ($this->right === null) $this->right = new BinaryNode($data);
			else $this->right->add($data);
		} 
	}

	public function getLeft() {
		return $this->left;
	}

	public function getRight() {
		return $this->left;
	}

	public function setData($data) {
		$this->data = $data;
	}
	
	public function getData() {
		return $this->data;
	}	

	public function __toString() {
		$ret = (string)$this->getData() . ':[';
        $ret .= ($this->left ? (string)$this->left : '<null>') . ',';
	    $ret .= ($this->right ? (string)$this->right : '<null>') . ']';
        
        return $ret;
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
