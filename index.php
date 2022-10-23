<?php
include_once 'check.php';						//Include the check.php file to see if the user is logged or not
if(isset($elog)) {								//If there is an error, so not logged
	echo " ";								//Echo nothing
} else {										//Else show that the user is logged in 
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>DAS Hair Sallon-Logged In</title>
	</head>

	<body>
		<center>
		<?php //<p>Welcome <?=$_SESSION['fname'], You are logged in!!!</p>?>
		<?php if($_SESSION['level']==1){						//If level is 1
					//include 'profile.php';						//Go to the page profile.php
					header("refresh:0; url=home.php");
				} else if($_SESSION['level']==0){				//If level is 0
					include 'admin.php';						//Go to the page admin.php
					header("refresh:0; url=admin.php");
				}
		?>

		<p><a href="logout.php">Log Out</a></p>
		</center>
	</body>
</html>
<?php } ?>