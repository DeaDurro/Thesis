<?php
//Check for credentials (Admin Credentials)
include_once 'check.php';
if(isset($elog)) {
	echo "Nothing!!!";
} else {
	if($_SESSION['level']==0){//Admin level
		if(isset($_GET['id'])){
			include_once 'conf.php';
			
			if($_GET['id']!=$_SESSION['id']) {//Check to not delete myself
				$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);
				if($db) {
					//Read DB the user, we get picture path and then we delete!!!
					$sqlu="select picture from `userinfo` where id='{$_GET['id']}'";
					$result=mysqli_query($db,$sqlu);
					if($row=mysqli_fetch_array($result))
						$path=$row['picture'];
					$sql="DELETE FROM `userinfo` where id='{$_GET['id']}' and level!=0;";//we don't delete administrators
					if(mysqli_query($db,$sql)){
						echo "<h3>The user is deleted!!</h3>";
						if(isset($path)) unlink($path);
						header("refresh:1; url=index.php");
					} else echo "A problem with user deletion happened";
				} else echo "No DB connection";
			} else echo "You cannot delete yourself!!!";
		} else echo "No id provided!!!";
	} else echo "<h4>You have no authorization to access this file</h4>";
}
