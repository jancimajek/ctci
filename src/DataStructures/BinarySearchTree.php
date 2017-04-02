<?php

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

	/**
	 * Finds $k-th smallest node in the BST
	 *
	 *          7
	 *        /   \
	 *       4     10
	 *      / \   / \
	 *     3  5  8   13
	 *            \   \
	 *            9   15
	 *                 \
	 *                 20
	 *
	 * @param BinarySearchTreeNode $node
	 * @param int $k
	 * @param int $cnt
	 * @return BinarySearchTreeNode
	 */
	public static function findKthSmallest(BinarySearchTreeNode $node, $k) {
		list ($ret, $cnt) = self::findKthSmallestHelper($node, $k);
		return ($cnt == $k) ? $ret : null;
	}

	/**
	 * Helper to find $k-th smalles node in the BST; return array of the node found and the count
	 * @param BinarySearchTreeNode $node
	 * @param int $k
	 * @param int $cnt
	 * @return array [BinarySearchTreeNode, int]
	 * @throws \Exception
	 */
	public static function findKthSmallestHelper(BinarySearchTreeNode $node, $k, $cnt = -1) {
		// Validate $k
		$k = (int)$k;
		if ($k < 0) throw new \Exception('Invalide value of k: ' . $k);

		// Default return self when at the first (smallest) node
		$ret = $node;

		// Dive left
		if ($node->hasLeft()) {
			list($ret, $cnt) = self::findKthSmallestHelper($node->getLeft(), $k, $cnt);
			if ($cnt == $k) return [$ret, $cnt];
		}

		// Increment count & check if found --> return this $node
		$cnt++;
		if ($cnt == $k) return [$node, $cnt];

		// Dive right
		if ($node->hasRight()) {
			list($ret, $cnt) = self::findKthSmallestHelper($node->getRight(), $k, $cnt);
		}

		return [$ret, $cnt];
	}
}