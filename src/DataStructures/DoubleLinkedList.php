<?php

namespace Janci\Ctci\DataStructures;

class DoubleLinkedList {
	private $first;
	private $last;

	public function addToTail($data) {
		$node = new DoubleLinkedListElement($data);

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
		$node = new DoubleLinkedListElement($data);

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
		for ($node = $this->first; $node !== null; $node = $node->getNext()) {
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
