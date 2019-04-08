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
	for ($i= 0; $i < strlen($str); $i++) { 
		for ($j=0; $j < sizeof($vowels) ; $j++) { 
			if ($str[$i] == $vowels[$j]) {
				$nVowels ++;
			}
			
		}
	}
	return $nVowels ;
}
function valueSecondCriterion($str,$str2){
	/* method for compare this value Unicode.does not apply. 
	$value = 0;
	for ($i= strlen($str)-1; $i > 0; $i--) { 
		$value += ord($str[$i]);
	}
	*/
	return strcmp($str, $str2);
}


function orderArray($array){
	
	for($i=1;$i<count($array);$i++){
        for($j=0;$j<count($array)-$i;$j++){
            if(valueFirstCriterion($array[$j])<valueFirstCriterion($array[$j+1])){
        		$k=$array[$j+1];
            	$array[$j+1]=$array[$j];
            	$array[$j]=$k;
                
            }else if(valueFirstCriterion($array[$j])==valueFirstCriterion($array[$j+1])){
            	if (valueSecondCriterion($array[$j],$array[$j+1]) < 0 ) {
            		$k=$array[$j+1];
            		$array[$j+1]=$array[$j];
            		$array[$j]=$k;
            	}
            }

        }
    }
	
	return $array;
}
$array = orderArray($array);
var_export($array);
?>