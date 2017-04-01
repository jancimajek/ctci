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


}