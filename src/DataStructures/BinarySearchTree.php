<?php
/**
 * Created by PhpStorm.
 * User: jan.majek
 * Date: 23/03/2017
 * Time: 11:06
 */

namespace Janci\Ctci\DataStructures;


class BinarySearchTree extends BinaryTree {

	public function add($data) {
		if ($this->getRoot() === null) $this->setRoot(new BinarySearchTreeNode($data));
		else $this->getRoot()->add($data);
	}

}