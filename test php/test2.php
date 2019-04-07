<?php
/*
 * This script is supposed to be protected from public access via an authentication method.
 * (the authentication method is assured by a login.php script. In case of success, $_SESSION['USER'] is set.)
 *
 * QUESTION: Just by statically looking at this script, do you think that it's doing its work properly? Please explain.
 * TODO YOUR ANSWER HERE:
*/

session_start();

if(!isset($_SESSION['USER']))
{
	header('Location: /login.php');
	return false;
}

header('Content-Type: text/html');
readfile('/path/to/protected/data');