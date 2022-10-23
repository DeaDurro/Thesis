<?php
session_start();				//start the session

session_destroy();				//destroy the session and the session variables
//echo "<h3>You are now logged out!!!</h3>";			//Show to the user that he/she is logged out
header("refresh:0; url=login.php");					//Refresh for 2 seconds and go the the login.php so the user can login