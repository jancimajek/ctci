<?php
/**
 * Created by PhpStorm.
 * User: jan.majek
 * Date: 23/03/2017
 * Time: 11:06
 */

namespace Janci\Ctci\DataStructures;


class BinarySearchTree extends BinaryTree {

	public function setRoot($data) {
		$this->root = new BinarySearchTreeNode($data);
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
}