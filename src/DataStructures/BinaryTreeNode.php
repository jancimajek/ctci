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
        if ($this->left === null) $this->left = new BinaryTreeNode($data);
        else $this->left->add($data);
    }

    public function addRight($data) {
        if ($this->right === null) $this->right = new BinaryTreeNode($data);
        else $this->right->add($data);
    }

    public function getLeft() {
        return $this->left;
    }

    public function getRight() {
        return $this->right;
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
        $ret['left']  = ($this->left ? $this->left->toArray() : null);
        $ret['right'] = ($this->right ? $this->right->toArray() : null);

        return $ret;
    }

    public function __toString() {
        return (string)$this->data;
    }
}
