<?php

namespace Janci\Ctci\DataStructures;

class BinaryTreeNode {
    private $data;
    private $left;
    private $right;

    public function __construct($data) {
        $this->setData($data);
    }

    public function add($data) {
        if (rand(0,1)) {
            if ($this->left === null) $this->left = new BinaryNode($data);
            else $this->left->add($data);
        } else {
            if ($this->right === null) $this->right = new BinaryNode($data);
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

    public function __toString() {
        $ret = (string)$this->getData() . ':[';
        $ret .= ($this->left ? (string)$this->left : '<null>') . ',';
        $ret .= ($this->right ? (string)$this->right : '<null>') . ']';

        return $ret;
    }
}
