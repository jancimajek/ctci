<?php

namespace Janci\Ctci\DataStructures;

class TreeNode {
    private $data;
    private $children;

    public function __construct($data) {
        $this->setData($data);
        $this->children = [];
    }

    public function addChild($data) {
        $this->children[] = new TreeNode($data);
    }

    public function getChildren() {
        return $this->children;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function __toString() {
        return (string)$this->data;
    }
}
