<?php
header("X-XSS-Protection: 1; mode=block");

	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Public Transport</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
			<link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
			<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
			<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>
			<style>
			
			table {
				border-collapse: collapse;
				width: 100%;
			}
			th {
				background-color: #6aa84f;
				border: 1px solid #6aa84f;
			}
			 th:hover {
				background-color: #fcf6ba;
			}
			th a {
				display: block;
				text-decoration:none;
				padding: 10px;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
			}
			th a i {
				margin-left: 5px;
				color: rgba(255,255,255,0.4);
			}
			td {
				padding: 10px;
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #ffffff;
			}
			tr .highlight {
				background-color: #f9fafb;
			}
			</style>
		</head>
		<body>
		<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    -->
    <div class="logo">
        <h3 class="simple-text logo-normal">
        
         <a > Welcome Commuter  </a>
        </h3>
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
            <a class="nav-link" href="croutes.php">
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
            <a class="nav-link" href="showappointments.php">
            <i class="material-icons">book_online</i>
              <p>Bookings</p>
            </a>
           
            </li>
            <li class="nav-item">
            <a class="nav-link" href="comtrack.php">
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
    <div class="main-panel">
        <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
          
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
                
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
               
             
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
      <form method="POST">
    <p>
        <input type="text" name="address" placeholder="Enter Address">
    </p>
 
    <input type="submit" name="submit_address">
</form>

<?php
    if (isset($_POST["submit_address"]))
    {
        $address = $_POST["address"];
        $address = str_replace(" ", "+", $address);
        ?>
 
        <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
 
        <?php
    }

?>