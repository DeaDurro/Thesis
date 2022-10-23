<?php
include_once 'check.php';
include_once 'conf.php';
$berr=false;
if(isset($elog)) {
	echo "Nothing!!!";
} else {
	if($_SESSION['level']==0){
		
		$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);
		if($db) {
			$sql="SELECT * FROM `userinfo` WHERE id='{$_SESSION['id']}';";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_assoc($result);

			$name= $row['name']; 
			$surname= $row['surname']; 
			$username= $row['username']; 
			$email= $row['email']; 
			$phone= $row['phonenumber']; 
		} else { $err['db']="No DB connection"; die();}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
			<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
			<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>
	<link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
    <link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		
	<title>Public Transportatio Admin-Profile</title>
	</head>
<body>
<div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    -->
      <div class="logo">
        <h3 class="simple-text logo-normal">
         Admin's Name
        </h3>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="admin.php">
              <i class="material-icons">dashboard</i>
              <p>Admin's Dashboard</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="vehicle.php">
            <i class="material-icons">badge</i>
              <p>Vehicles</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="client.php">
            <i class="material-icons">supervisor_account</i>
              <p>Comuters</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="routes.php">
            <i class="material-icons">supervisor_account</i>
              <p>Routes</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="material-icons">book_online</i>
              <p>Bookings</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="tracking.php">
            <i class="material-icons">supervisor_account</i>
              <p>Tracking</p>
            </a>
            </li>
			     <li class="nav-item">
            <a class="nav-link" href="mailer.php">
            <i class="material-icons">mail_outline</i>
              <p>Mailer</p>
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
 
    <div class="main-panel">
        <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="admin.php">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="admin.php">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account Name 
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--End of nav bar -->
      
      

      <div id="wrap">

      <div class="content-area" >
			<div id="profile">
				<div id="header">
			<h2> Welcome, <?php echo htmlentities($name) ?> </h2>
			<img src="img/user.png" alt="user" />
				</div>
				<p>Name: <?php echo htmlentities($name); ?></p>
			<p>Surname: <?php echo htmlentities($surname); ?></p>
			<p>Username: <?php echo htmlentities($username); ?></p>
			<p>Email: <?php echo htmlentities($email); ?></p>
            <p>Phone: <?php echo "0".htmlentities($phone); ?></p>
		
			</div>
      </div>
		
		</div>

<?php }
 else header("Location: index.php"); 
}?>
</body>
</html>