<?php

namespace Janci\Ctci\DataStructures;

class LinkedListElement {
    // @var ListElement
    private $next;
    private $data;

    public function __construct($data) {
        $this->setData($data);
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function setNext(LinkedListElement $next = null) {
        $this->next = $next;
    }

    public function hasNext() {
        return ($this->next !== null);
    }

    public function getNext() {
        return $this->next;
    }

    public function __toString() {
        return (string)$this->data;
    }
}
