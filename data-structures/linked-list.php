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

echo $list->find(3) . PHP_EOL;
echo $list->find(11) . PHP_EOL;
echo $list . PHP_EOL;

echo $list->remove(3) . PHP_EOL;
echo $list . PHP_EOL;
echo $list->remove(0) . PHP_EOL;
echo $list . PHP_EOL;
echo $list->remove(9) . PHP_EOL;
echo $list . PHP_EOL;


class LinkedList {
	private $first;

	public function addToTail($data) {
		$node = new ListElement($data);

		if ($this->first !== null) {
			for ($last = $this->first; $last->hasNext(); $last = $last->getNext());
			$last->setNext($node);
		} else {
			$this->first = $node;
		}
	}

	public function addToHead($data) {
		$node = new ListElement($data);
		if ($this->first !== null) {
			$node->setNext($this->first);
		}
		$this->first = $node;
	}

	public function find($data) {
		for ($node = $this->first; $node !== null; $node = $node->getNext()) {
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
				if ($prevNode === null) $this->first = $node->getNext();
				else $prevNode->setNext($node->getNext());
				$node->setNext(null);
				return $node;
			}
		}
		return null;
	}

	public function __toString() {
		$ret= [];
		for ($node = $this->first; $node !== null; $node = $node->getNext()) {
			$ret[] = $node->getData();
		}

		return '{' . implode('->', $ret) . '}';
	}
}

class ListElement {
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

	public function setNext(ListElement $next = null) {
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