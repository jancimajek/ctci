<?php

namespace Janci\Ctci\DataStructures;


class Trie {
	/**
	 * @var TrieNode
	 */
	protected $root;

	public function __construct(array $words = []) {
		$this->root = new TrieNode();

		foreach ($words as $word) {
			$this->add($word);
		}
	}

	public function add($word) {
		$word = (string)$word;

		$this->root->add($word);
	}

	public function contains($word, $exact = false) {

	}
}