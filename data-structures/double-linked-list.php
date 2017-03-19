<?php

$list = new LinkedList();
$list->addToTail(0);
$list->addToTail(1);
$list->addToTail(2);
$list->addToTail(3);
$list->addToTail(4);
$list->addToTail(5);
$list->addToTail(6);
$list->addToTail(7);
$list->addToTail(8);
$list->addToTail(9);

echo $list . PHP_EOL;

echo $list->findFromHead(3) . PHP_EOL;
echo $list->findFromTail(3) . PHP_EOL;
echo $list->findFromHead(11) . PHP_EOL;
echo $list->findFromTail(11) . PHP_EOL;
echo $list . PHP_EOL;

echo $list->remove(3) . PHP_EOL;
echo $list . PHP_EOL;
echo $list->remove(0) . PHP_EOL;
echo $list . PHP_EOL;
echo $list->remove(9) . PHP_EOL;
echo $list . PHP_EOL;


class LinkedList {
	private $first;
	private $last;

	public function addToTail($data) {
		$node = new DoubleListElement($data);

		// First (and last) node of the list
		if ($this->last === null) {
			$this->first = $this->last = $node;
		} else {
			$this->last->setNext($node);
			$node->setPrev($this->last);
			$this->last = $node;
		}
	}

	public function addToHead($data) {
		$node = new DoubleListElement($data);

		// First (and last) node of the list
		if ($this->first === null) {
			$this->first = $this->last = $node;
		} else {
			$this->first->setPrev($node);
			$node->setNext($this->first);
			$this->first = $node;
		}
		$this->first = $node;
	}

	public function findFromHead($data) {
		for ($node = $this->first; $node !== null; $node = $node->getNext()) {
			if ($node->getData() === $data) return $node;
		}
		return null;
	}

	public function findFromTail($data) {
		for ($node = $this->last; $node !== null; $node = $node->getPrev()) {
			if ($node->getData() === $data) return $node;
		}
		return null;
	}

	public function remove($data) {
		for (
			$prevNode = null, $node = $this->first; 
			$node !== null; 
			$prevNode = $node, $node = $node->getNext()
		) {
			if ($node->getData() === $data) {
				// Link previous node (or first node if this was the first, 
				// i.e. there is no previous node) to the next node
				if ($node->hasPrev()) $node->getPrev()->setNext($node->getNext());
				else $this->first = $node->getNext();

				// Link next node (or last node if this was the last, 
				// i.e. there is no next node) to the previous node
				if ($node->hasNext()) $node->getNext()->setPrev($node->getPrev());
				else $this->last = $node->getPrev();

				// Remove links from the node being deleted
				$node->setPrev(null);
				$node->setNext(null);

				return $node;
			}
		}
		return null;
	}

	public function __toString() {
		$retFwd = [];
		for ($node = $this->first; $node !== null; $node = $node->getNext()) {
			$retFwd[] = $node->getData();
		}

		$retBkw = [];
		for ($node = $this->last; $node !== null; $node = $node->getPrev()) {
			array_unshift($retBkw, $node->getData());
		}

		return '{' . implode('->', $retFwd) . '}' . PHP_EOL . '{' . implode('<-', $retBkw) . '}';
	}
}

class DoubleListElement {
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

	public function setPrev(DoubleListElement $prev = null) {
		$this->prev = $prev;
	}

	public function hasPrev() {
		return ($this->prev !== null);
	}

	public function getPrev() {
		return $this->prev;
	}

	public function setNext(DoubleListElement $next = null) {
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