<?php
/**
 * Created by PhpStorm.
 * User: jan.majek
 * Date: 23/03/2017
 * Time: 12:07
 */

namespace Janci\Ctci\DataStructures;


class BinarySearchTreeNode extends BinaryTreeNode {
	public function add($data) {
		if (rand(0,1)) {
			$this->addLeft($data);
		} else {
			$this->addRight($data);
		}
	}

	public function addLeft($data) {
		if ($this->getLeft() === null) $this->setLeft(new BinarySearchTreeNode($data));
		else $this->getLeft()->add($data);
	}

	public function addRight($data) {
		if ($this->getRight() === null) $this->setRight(new BinarySearchTreeNode($data));
		else $this->getRight()->add($data);
	}

	public function setLeft(BinarySearchTreeNode $left = null) {
		return $this->left = $left;
	}

	public function setRight(BinarySearchTreeNode $right = null) {
		return $this->right = $right;
	}


}