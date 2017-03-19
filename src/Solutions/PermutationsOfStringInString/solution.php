<?php

define('DBG', false);

// test('abc', 'aabcaccabac');
test('abbc', 'babcabbacaabcbabcacbbcbabbacbcbabcdefbbcdsbaccbaccbabbbaacbaccbbbccabcabcabcbbcacbacacabcacbabc');


function findPermutations($s, $b) {
	$ps = []; // Permutations

	$l = strlen($b) - strlen($s) + 1;
	dbg('l:' . $l . PHP_EOL);
	for ($i = 0; $i < $l; $i++) {
		$p = substr($b, $i, strlen($s));
		dbg('i:' . $i . '; p:"' . $p . '";' . PHP_EOL);
		if (isPermutation($s, $p)) {
			$ps[$i] = $p;
		}
	}

	return $ps;
}

function isPermutation($s, $p) {
	static $ps = [];
	static $cc = [];

	dbg('s:"' .$p . '"; p:"' . $s . '"; ');

	$l = strlen($s);

	// Just a safety check that the strings are of equal length, 
	// otherwise if cannot be a permutation
	if ($l != strlen($p)) { 
		return false;
	}

	// Has this permutation been computed already before?
	if (isset($ps[$s][$p])) return $ps[$s][$p];

	// Compute character count for $s if we haven't done this before
	if (!isset($cc[$s])) {
		$ccs = [];
		for ($i = 0; $i < $l; $i++) {
			$c = $s[$i];
			// First occurence of the character;
			if (!isset($ccs[$c])) $ccs[$c] = 0;
			// Inrement count
			$ccs[$c]++;
		}
		$cc[$s] = $ccs;
	}
	$ccs = $cc[$s];

	// Go through p and decrement character counts until reaching end of the string 
	// (is permutation) or finding a character with count 0 (is not permutation)
	$isPerm = true;
	for ($i = 0; $i < $l; $i++) {
		$c = $p[$i];
		if (!isset($ccs[$c]) || $ccs[$c] == 0) {
			$isPerm = false;
			break;
		}
		$ccs[$c]--;
	}

	// Cache the result for future and return
	$ps[$s][$p] = $isPerm;
	return $isPerm;
}

function test($s, $b) {
	echo 's: "' . $s . '"' . PHP_EOL;
	echo 'b: "' . $b . '"' . PHP_EOL;

	$ps = findPermutations($s, $b);
	foreach ($ps as $i => $p) {
		echo 'p: "' . highlight($b, $p, $i) . '"' . PHP_EOL;
	}

	echo count($ps) . ' permutation' . (count($ps) !== 1 ? 's' : '') . PHP_EOL;

	echo '---------------------------' . PHP_EOL;
}

function highlight($b, $p, $i) {
	return substr($b, 0, $i) . strtoupper($p) . substr($b, $i + strlen($p));
}

function dbg($m) {
	if (DBG) echo $m;
}