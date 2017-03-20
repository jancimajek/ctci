<?php

namespace Janci\Ctci\DataStructures;

class DoubleLinkedListElement {
    // @var DoubleListElement
    private $next;
    private $prev;
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

    public function setPrev(DoubleLinkedListElement $prev = null) {
        $this->prev = $prev;
    }

    public function hasPrev() {
        return ($this->prev !== null);
    }

    public function getPrev() {
        return $this->prev;
    }

    public function setNext(DoubleLinkedListElement $next = null) {
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
