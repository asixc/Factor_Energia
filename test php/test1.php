<?php

// EXAMPLE DATA

$array = [
	'hello',
	'internet',
	'people'
];


/* OBJECTIVE
 * =========
 *
 * Write a php5.6 code that sorts the array $array, and then outputs the result using var_export().
 * To simplify this test, all elements of the array are ASCII strings (more precisely, only non-accented lowercase letters).
 *
 * This sort algorithm should follow 2 criteria (the 2nd one is used in case the first results in a draw)
 *  - 1st criterion is the number of vowels (aeiou) in the string. A string with more vowels should come first.
 *  - 2nd criterion is the alphabetical order of the reversed string (hello -> olleh). Order it from "a" to "z". (ASCII sort, just like the one implemented by strcmp())
 *
 * With the test data $array presented above, the expected result would be:
 *   array('people', 'internet', 'hello')
 */

// TODO: INSERT YOUR CODE HERE!

function valueFirstCriterion($str){
	$nVowels = 0;
	$vowels = ['a','e','i','o','u'];
	for ($i= strlen($str)-1; $i > 0; $i--) { 
		//echo "Valor = ".$value. " + ". ord($str[$i]). '<br>';
		for ($j=0; $j < sizeof($vowels) ; $j++) { 
			if ($str[$i] == $vowels[$j]) {
				//echo "Vocal encontrad: ". $str[$i];
				$nVowels ++;
			}
			
		}
	}
	return $nVowels ;
}
function valueSecondCriterion($str){
	$value = 0;
	for ($i= strlen($str)-1; $i > 0; $i--) { 
		//echo "Valor = ".$value. " + ". ord($str[$i]). '<br>';
		$value += ord($str[$i]);
	}
	echo '<br>';
	return $value;
}

function orderArray($array){
	$res = [];
	for ($i=0; $i < sizeof($array) ; $i++) { 
		
		$key = valueFirstCriterion($array[$i]);
		echo '<br>'.$array[$i].$key.'<br>';
 		array_push($res , $array[$key] = $array[$i])  ;
	}
	/*
	foreach ($array as $i => $value) {
		$array[$i] = 
		$i = valueFirstCriterion($value);
		//echo $i . '-' . $value;
	}
	*/
	krsort($res);
	return $res;
}
var_export($array);
echo "<br>";
$array = orderArray($array);
echo "<br>";
var_export($array);
?>