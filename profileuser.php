<?php
header("X-XSS-Protection: 1; mode=block");

include_once 'check.php';
include_once 'conf.php';
$berr=false;
if(isset($elog)) {
	echo "Nothing!!!";
} else {
	if($_SESSION['level']==1){
		
		$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);
		if($db) {
			$sql="SELECT * FROM `userinfo` WHERE id='{$_SESSION['id']}';";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_assoc($result);

			$name= mysqli_real_escape_string($db,$row['name']); 
			$surname=mysqli_real_escape_string($db,$row['surname']); 
			$username=mysqli_real_escape_string($db,$row['username']); 
			$email=mysqli_real_escape_string($db,$row['email']); 
			$phone=mysqli_real_escape_string($db,$row['phonenumber']); 
	/*	echo "<p>Profile Info \n:</p>";
		echo "<p>Name:{$row['name']}\n</p>";
		echo "<p>Surname :{$row['surname']}\n</p>";	
		echo "<p>Username:{$row['username']}\n</p>";	
		echo "<p>Password:{$row['password']}\n</p>";	
		echo "<p>Email:{$row['email']}\n</p>";		
		echo "<p>Phone Number:{$row['phonenumber']}\n</p>"; */

		} else { $err['db']="No DB connection"; die();}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
    <link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>
		
	
	<style>
	body {
  background-color: lightblue;
}
</style>
	<title>Public Transport Commuter Profile</title>
	</head>
<body>
<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="yellow">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    -->
      <div class="logo">
	  <li class="nav-item active">
	  <a class="nav-link" href="profileuser.php">
        <h3 class="simple-text logo-normal">
         <a >  Commuter Profile</a>
        </h3>
		</li>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="Commuter.php">
              <i class="material-icons">dashboard</i>
              <p>Commuter </p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="">
            <i class="material-icons">badge</i>
              <p>Urban Lines</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="services.php">
            <i class="material-icons">supervisor_account</i>
              <p>Inter Urban Lines</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="showadminapp.php">
            <i class="material-icons">book_online</i>
              <p>Bookings</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="tracking.php">
            <i class="material-icons">book_online</i>
              <p>Track journey</p>
            </a>
            </li>

			    
            <li class="nav-item">
            <a class="nav-link" href="logout.php">
            <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
            </li>
        
        </ul>
      </div>
    </div>

	<style>

#profile{
				position: absolute;
 				top: 20%;
  				left: 60%;
  				transform: translate(-50%, -50%) ;
  				padding: 30px;
				display: block;
                text-align: center;
			}
	</style>


		<div class="content-area" >
			<div id="profile">
				<div id="header">
			<h1> Welcome, <?php echo htmlentities($name) ?> </h1>
			<img src="img/user.png" alt="user" />
				</div>
				<p>Name: <?php echo htmlentities($name); ?></p>
			<p>Surname: <?php echo htmlentities($surname); ?></p>
			<p>Username: <?php echo htmlentities($username); ?></p>
			<p>Email: <?php echo htmlentities($email); ?></p>
            <p>Phone: <?php echo "0".htmlentities($phone); ?></p>
			<a href="showappointments.php"> See Your Journeys</br>
			<a href="edituser.php"> Edit Your Profile
			</div>
	
		</div>



<?php }
 else header("Location: index.php"); 
}?>
</body>
</html>