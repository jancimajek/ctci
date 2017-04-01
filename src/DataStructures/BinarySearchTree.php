<?php
/**
 * Created by PhpStorm.
 * User: jan.majek
 * Date: 23/03/2017
 * Time: 11:06
 */

namespace Janci\Ctci\DataStructures;


class BinarySearchTree extends BinaryTree {
	/**
	 * @var BinarySearchTreeNode
	 */
	protected $root;

	public function setRoot($data) {
		$this->root = new BinarySearchTreeNode($data);
	}

	/**
	 * @return BinarySearchTreeNode
	 */
	public function getRoot() {
		return $this->root;
	}


	public function inOrderTraversal() {
		if ($this->isEmpty()) return [];

		return $this->getRoot()->inOrderTraversal();
	}

	public function inOrderTraversal2() {
		return self::inOrderTraversalFromNode($this->getRoot());
	}

	public static function inOrderTraversalFromNode(BinarySearchTreeNode $node = null) {
		if ($node === null) return [];

		$ret = [];
		$ret = array_merge($ret, self::inOrderTraversalFromNode($node->getLeft()));
		$ret[] = $node->getData();
		$ret = array_merge($ret, self::inOrderTraversalFromNode($node->getRight()));

		return $ret;
	}


	public function preOrderTraversal() {
		if ($this->isEmpty()) return [];

		return $this->getRoot()->preOrderTraversal();
	}

	public function preOrderTraversal2() {
		return self::preOrderTraversalFromNode($this->getRoot());
	}

	public static function preOrderTraversalFromNode(BinarySearchTreeNode $node = null) {
		if ($node === null) return [];

		$ret = [ $node->getData() ];
		$ret = array_merge($ret, self::preOrderTraversalFromNode($node->getLeft()));
		$ret = array_merge($ret, self::preOrderTraversalFromNode($node->getRight()));

		return $ret;
	}


	public function postOrderTraversal() {
		if ($this->isEmpty()) return [];

		return $this->getRoot()->postOrderTraversal();
	}

	public function postOrderTraversal2() {
		return self::postOrderTraversalFromNode($this->getRoot());
	}

	public static function postOrderTraversalFromNode(BinarySearchTreeNode $node = null) {
		if ($node === null) return [];

		$ret = [];
		$ret = array_merge($ret, self::postOrderTraversalFromNode($node->getLeft()));
		$ret = array_merge($ret, self::postOrderTraversalFromNode($node->getRight()));
		$ret[] = $node->getData();

		return $ret;
	}

}