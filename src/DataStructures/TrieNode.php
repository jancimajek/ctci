<?php
/**
 * Created by PhpStorm.
 * User: jan.majek
 * Date: 05/04/2017
 * Time: 12:48
 */

namespace Janci\Ctci\DataStructures;


class TrieNode {
	protected $char;
	protected $children;
	protected $terminate;

	public function __construct($char = '') {
		$this->terminate = false;
		$this->char = $char;
		$this->children = [];
	}

	public function add($word) {
		$word = (string)$word;
		if (strlen($word) === 0) {
			$this->terminate = true;
		}

		$char = $word[0];
		if (!isset($this->children[$char])) {
			$this->children[$char] = new TrieNode($char);
		}

		$this->children[$char]->add(substr($word, 1));
	}

	public function contains($word, $exact = false) {
		$word = (string)$word;
		if (strlen($word) === 0) {
			$this->terminate = true;
		}
	}

	public function __toString() {
		$ret = $this->char;
		if ($this->terminate) $ret .= PHP_EOL;


	}

}