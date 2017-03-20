<?php

namespace Janci\Ctci\DataStructures;

class LinkedList {
	private $first;

	public function addToTail($data) {
		$node = new LinkedListElement($data);

		if ($this->first !== null) {
			for ($last = $this->first; $last->hasNext(); $last = $last->getNext());
			$last->setNext($node);
		} else {
			$this->first = $node;
		}
	}

	public function addToHead($data) {
		$node = new LinkedListElement($data);
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
