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
            if ($this->left === null) $this->left = new BinaryTreeNode($data);
            else $this->left->add($data);
        } else {
            if ($this->right === null) $this->right = new BinaryTreeNode($data);
            else $this->right->add($data);
        }
    }

    public function getLeft() {
        return $this->left;
    }

    public function getRight() {
        return $this->left;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
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
}
