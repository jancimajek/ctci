<?php

// findCommonElementsOpt2Debug(
// 	[1,3,7,10,11,12,20,30,37,50],
// 	[1,4,10,12,13,14,17,20,25]
// );
// exit;

test(
	[1,3,7,10,11,12,20,30,37,50],
	[1,4,10,12,13,14,17,20,25]
);

test(
	[10,15,20],
	[1,2,3]
);

test(
	[1,2,3],
	[10,15,20]
);

test(
	[1,2,3],
	[1,2,3]
);

test(
	[3,4],
	[1,2,3]
);

test(
	[1,2,3],
	[3,4]
);



function findCommonElementsOpt2(array $a, array $b) {
	$profile = 0;
	$ret = [];
	$start = 0;

	for ($i = 0; $i < count($a); $i++) {

		// If the starting position in $b is aleady out of bounds, we can stop
		// because we know no other elements from $a can exist in $b since they
		// are greater than any element in $b
		// E.g. $a = [10,15,20]; $b = [1,2,3] --> we only need to scan $a once
		if ($start >= count($b)) break;

		for ($j = $start; $j < count($b); $j++) {
			$profile++;

			if ($a[$i] == $b[$j]) {
				$ret[] = $a[$i];				
				// Increment $j here so that in next iteration start looking
				// form the next element in $b
				$j++; 
				break;
			} elseif ($b[$j] > $a[$i]) {
				// No need to scanning $b any further since we know that the 
				// rest of the elements are greated than $a[$i] (because the
				// arrays are sorted)
				break;
			}
		}

		$start = $j;
	}

	echo 'OPT2: O(' . $profile . '): ';
	return $ret;
}


function findCommonElementsOpt2Debug(array $a, array $b) {
	$profile = 0;
	$ret = [];
	$start = 0;
	echo 'a=[' . implode(',', $a) . ']; count=' . count($a) . PHP_EOL;
	echo 'b=[' . implode(',', $b) . ']; count=' . count($b) . PHP_EOL;


	for ($i = 0; $i < count($a); $i++) {

		// If the starting position in $b is aleady out of bounds, we can stop
		// because we know no other elements from $a can exist in $b since they
		// are greater than any element in $b
		// E.g. $a = [10,15,20]; $b = [1,2,3] --> we only need to scan $a once
		if ($start >= count($b)) {
			echo PHP_EOL . 's=' . $start . '; i=' . $i . '; a[i]=' . $a[$i] . '; ';
			echo '!!! BREAK (start >= count(b)); ';
			break;
		}

		for ($j = $start; $j < count($b); $j++) {
			$profile++;

			echo PHP_EOL . 's=' . $start . '; i=' . $i . '; a[i]=' . $a[$i] . '; j=' . $j . '; b[j]=' . $b[$j] . '; ';

			if ($a[$i] == $b[$j]) {
				$ret[] = $a[$i];				
				// Increment $j here so that in next iteration start looking
				// form the next element in $b
				$j++; 

				echo '!!! MATCH; j++=' . $j .'; ';
				break;
			} elseif ($b[$j] > $a[$i]) {
				// No need to scanning $b any further since we know that the 
				// rest of the elements are greated than $a[$i] (because the
				// arrays are sorted)

				echo '!!! BREAK (b[j] < a[i]); ';
				break;
			}
		}

		$start = $j;
		echo  'ENDFOR j; s=j=' . $start . '; ';
	}

	echo PHP_EOL . 'OPT2: O(' . $profile . '): [' . implode(',', $ret) . ']' . PHP_EOL;
	return $ret;
}


function findCommonElementsOpt1(array $a, array $b) {
	$profile = 0;
	$ret = [];
	$start = 0;

	for ($i = 0; $i < count($a); $i++) {
		for ($j = $start; $j < count($b); $j++) {
			$profile++;

			if ($a[$i] == $b[$j]) {
				$ret[] = $a[$i];				
				$start = $j + 1;
				break;
			} elseif ($b[$j] > $a[$i]) {
				$start = $j;
				break;
			}
		}
	}

	echo 'OPT1: O(' . $profile . '): ';
	return $ret;
}

function findCommonElementsBF(array $a, array $b) {
	$profile = 0;
	$ret = [];

	for ($i = 0; $i < count($a); $i++) {
		for ($j = 0; $j < count($b); $j++) {
			$profile++;

			if ($a[$i] == $b[$j]) {
				$ret[] = $a[$i];				
			}
		}
	}

	echo 'BF: O(' . $profile . '): ';
	return $ret;
}


function test(array $a, array $b) {
	echo '[' . implode(',', $a) . ']' . PHP_EOL;
	echo '[' . implode(',', $b) . ']' . PHP_EOL;
	echo '[' . implode(',', findCommonElementsBF($a, $b))   . ']' . PHP_EOL;
	echo '[' . implode(',', findCommonElementsOpt1($a, $b)) . ']' . PHP_EOL;
	echo '[' . implode(',', findCommonElementsOpt2($a, $b)) . ']' . PHP_EOL . '--------------' . PHP_EOL;

}
