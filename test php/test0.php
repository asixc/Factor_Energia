<?php

/* Write a php 5.6 function that performs a set difference, giving two outputs.
 *
 * A and B are sorted sets of integers. This function must output {A - B} and {B - A}.
 *
 * Example
 * =======
 *
 * Input:
 * A = 1 2 3 8 9
 * B = 2 5 9 10 12 14
 *
 * Output:
 * {A - B} = 1 3 8
 * {B - A} = 5 10 12 14
 *
 * Please implement this PHP function without the help of array_*() methods, and also without in_array()
*/

// TODO: INSERT YOUR CODE HERE!
$A = [1,2,3,8,9];
$B = [2,5,9,10,12,14];

function show($a,$b){
	for ($i=0; $i < sizeof($a) ; $i++) { 
		$found = false;
		for ($j=0; $j < sizeof($b); $j++) { 
			if ($a[$i]==$b[$j]) {
				$found = true;
			}
			if ($j == sizeof($b)-1 && !$found) {
				echo $a[$i].' ';
			}
		}
		
	}
	echo '<br>';
}
show($A, $B);
show($B, $A);