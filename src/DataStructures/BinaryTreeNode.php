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
    /**
     * @var BinaryTreeNode
     */
    private $parent;
    private $height = -1;

    public function __construct($data, $parent = null) {
        $this->setData($data);
        $this->parent = $parent;
    }

    public function add($data) {
        if (rand(0,1)) {
            $this->addLeft($data);
        } else {
            $this->addRight($data);
        }
    }

    public function addLeft($data) {
        if ($this->getLeft() === null) $this->setLeft(new BinaryTreeNode($data, $this));
        else $this->getLeft()->add($data);
    }

    public function addRight($data) {
        if ($this->getRight() === null) $this->setRight(new BinaryTreeNode($data, $this));
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

    public function getParent() {
        return $this->parent;
    }

    public function isRoot() {
        return ($this->parent === null);
    }

    public function getHeight() {
        if ($this->height > -1) return $this->height;

        if ($this->isRoot()) $this->height = 0;
        else $this->height = $this->getParent()->getHeight() + 1;

        return $this->height;
    }

    /**
     * Finds lowest common ancestor with given $node
     * O(N) runtime complexity, O(1) space complexity
     *
     * @param BinaryTreeNode $node
     * @return BinaryTreeNode|null
     */
    public function getLowestCommonAncestor(BinaryTreeNode $node) {

        // Find which node is lower and which is higher in the tree
        if ($this->getHeight() > $node->getHeight()) {
            $lower = $this;
            $higher = $node;
        } else {
            $lower = $node;
            $higher = $this;
        }

        // Find ancestor of the lower node on the same level as the higher node
        while ($lower->getHeight() > $higher->getHeight()) {
            $lower = $lower->getParent();
        }

        // Check ancestors of both nodes going level by level up the tree until they are equal --> LCA
        while ($lower !== $higher) {
            if ($lower === null || $higher === null) {
                throw new \RuntimeException("Invalid Binary Tree: Nodes are not part of the same tree");
            }
            $lower = $lower->getParent();
            $higher = $higher->getParent();
        }

        if ($lower === null || $higher === null) {
            throw new \RuntimeException("Invalid Binary Tree: Nodes are not part of the same tree");
        } else {
            return $lower;
        }
    }

    /**
     * Traverse the tree breadth first
     *
     * @param Queue $queue
     * @return mixed
     */
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
