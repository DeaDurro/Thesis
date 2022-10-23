<?php
session_start();						                //start the session
if(!isset($_SESSION['level'])){			                //If the level is not set
	//echo "<center><h2>You are not logged In!!!</h2></center>";			//Means the user is not logged in
	header("refresh:0;url=login.php");					//Refresh for 2 seconds and go back to the login so the user can log in
	$elog=true;											//Error of login is true
}