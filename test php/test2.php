<?php
/*
 * This script is supposed to be protected from public access via an authentication method.
 * (the authentication method is assured by a login.php script. In case of success, $_SESSION['USER'] is set.)
 *
 * QUESTION: Just by statically looking at this script, do you think that it's doing its work properly? Please explain.
*/
session_start();

if(!isset($_SESSION['USER']))
{
	header('Location: /login.php');
	return false;
}

header('Content-Type: text/html');
readfile('/path/to/protected/data');
/*
 * TODO YOUR ANSWER HERE:

First of all it is not validating the information of the session variable $ _SESSION ['USER'] since it is only checking that it is not null but not valid.

Therefore, if the declared variable exists even if it is not valid, it will not enter in the if and continue reading / executing and the consequent code will show the "protected" content.

I consider that the inverse should be done and adding a token as a variable. For example:
*/

if(isset($_SESSION['USER']) && ControllerUser::checkToken($_SESSION['TOKEN']) ){
	header('Content-Type: text/html');
	readfile('/path/to/protected/data');
	
}else{
	header('Location: /login.php');
	return false;
}

