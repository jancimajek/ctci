<?php

namespace Janci\Ctci\DataStructures;

class BinaryTreeNode {
    private $data;
    /**
     * @var BinaryTreeNode
     */
    private $left;
    /**
     * @var BinaryTreeNode
     */
    private $right;

    public function __construct($data) {
        $this->setData($data);
    }

    public function add($data) {
        if (rand(0,1)) {
            $this->addLeft($data);
        } else {
            $this->addRight($data);
        }
    }

    public function addLeft($data) {
        if ($this->getLeft() === null) $this->setLeft(new BinaryTreeNode($data));
        else $this->getLeft()->add($data);
    }

    public function addRight($data) {
        if ($this->getRight() === null) $this->setRight(new BinaryTreeNode($data));
        else $this->getRight()->add($data);
    }

    public function hasLeft() {
    	return ($this->left !== null);
    }

	public function getLeft() {
		return $this->left;
	}

	public function setLeft(BinaryTreeNode $left = null) {
		return $this->left = $left;
	}

	public function hasRight() {
		return ($this->right !== null);
	}

	public function getRight() {
        return $this->right;
    }

	public function setRight(BinaryTreeNode $right = null) {
		return $this->right = $right;
	}

	public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function breadthFirstTraversal(Queue $queue) {
        $queue->enqueue($this->getLeft());
        $queue->enqueue($this->getRight());

        return $this->getData();
    }

    /**
     * {
     *   "<root-value>",
     *   "left": {
     *     "value": "<value>",
     *     "left": {
     *       "value": "<value>",
     *       "left": null,
     *       "right": {
     *         "value": "<value>",
     *         "left": null,
     *         "right": null,
     *       }
     *     },
     *     "right": null
     *   },
     *   "right": {
     *     "value": "<value>"
     *     "left": null,
     *     "right": null
     *   }
     * }
     * @return string JSON
     */
    public function toArray() {
        $ret = [];
        $ret['value'] =  $this->getData();
        $ret['left']  = ($this->hasLeft() ? $this->getLeft()->toArray() : null);
        $ret['right'] = ($this->hasRight() ? $this->getRight()->toArray() : null);

        return $ret;
    }

    public function __toString() {
        return (string)$this->getData();
    }
}
