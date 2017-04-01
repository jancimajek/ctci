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


}