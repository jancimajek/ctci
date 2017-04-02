<?php

namespace Janci\Ctci\DataStructures;


class BinarySearchTreeNode extends BinaryTreeNode {
	/**
	 * @var BinarySearchTreeNode
	 */
	protected $left;
	/**
	 * @var BinarySearchTreeNode
	 */
	protected $right;
	/**
	 * @var BinarySearchTreeNode
	 */
	protected $parent;

	public function add($data) {
		if ($data <= $this->getData()) {
			$this->addLeft($data);
		} else {
			$this->addRight($data);
		}
	}

	public function addLeft($data) {
		// Validate the data
		if ($data > $this->getData())
			throw new \RuntimeException('Cannot add ' . $data . ' to the left of ' . $this->getData());

		if ($this->hasLeft()) $this->getLeft()->add($data);
		else $this->left = new BinarySearchTreeNode($data, $this);
	}

	public function addRight($data) {
		// Validate the data
		if ($data <= $this->getData())
			throw new \RuntimeException('Cannot add ' . $data . ' to the right of ' . $this->getData());

		if ($this->hasRight()) $this->getRight()->add($data);
		else $this->right = new BinarySearchTreeNode($data, $this);
	}

	/**
	 * @return BinarySearchTreeNode
	 */
	public function getLeft() {
		return $this->left;
	}

	/**
	 * @return BinarySearchTreeNode
	 */
	public function getRight() {
		return $this->right;
	}

	/**
	 * @return BinarySearchTreeNode
	 */
	public function getParent() {
		return $this->parent;
	}

	public function inOrderTraversal() {
		$ret = [];

		if ($this->hasLeft())
			$ret = array_merge($ret, $this->getLeft()->inOrderTraversal());

		$ret[] = $this->getData();

		if ($this->hasRight())
			$ret = array_merge($ret, $this->getRight()->inOrderTraversal());

		return $ret;
	}

	public function preOrderTraversal() {
		$ret = [ $this->getData() ];

		if ($this->hasLeft())
			$ret = array_merge($ret, $this->getLeft()->preOrderTraversal());

		if ($this->hasRight())
			$ret = array_merge($ret, $this->getRight()->preOrderTraversal());

		return $ret;
	}

	public function postOrderTraversal() {
		$ret = [];

		if ($this->hasLeft())
			$ret = array_merge($ret, $this->getLeft()->postOrderTraversal());

		if ($this->hasRight())
			$ret = array_merge($ret, $this->getRight()->postOrderTraversal());

		$ret[] = $this->getData();

		return $ret;
	}
}