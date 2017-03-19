<?php

class Tree {
	private $root;

	public function __construct($data) {
		$this->root = new Node($data);
	}

	public function getRoot() {
		return $this->root;
	}

	public function __toString() {
		return $root->__toString();
	}
}

class Node {
	private $data;
	private $children;	

	public function __construct($data) {
		$this->setData($data);
		$this->children = [];
	}

	public function addChild($data) {
		$this->children[] = new Node($data);
	}

	public function getChildren() {
		return $this->children;
	}

	public function setData($data) {
		$this->data = $data;
	}

	public function getData() {
		return $this->data;
	}	

	public function __toString() {
		return (string)$this->data;
	}
}

function test() {
}

test();
