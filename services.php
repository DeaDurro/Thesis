<?php
	
	include_once 'conf.php';
	$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);
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

		<title>Public Transport</title>
	</head>
<body>

<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    -->
      <div class="logo">
        <h3 class="simple-text logo-normal">
         <a > Welcome Commuter</a>
        </h3>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="profileuser.php">
              <i class="material-icons">dashboard</i>
              <p>Commuter Profile</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="staff.php">
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
	<div class="content-area" id="serv">
	<div class="container my-4 justify-content-center">
    <div class=" row justify-content-center ">
        <div class="col-sm mt-5 mx-5  ">
            <div class="card mt-3 h-100 ">
                <div class="card-header text-center ">
                    <div class="row justify-content-center ">
                        <div class="col"> 
							
						</div>
                    </div>
                    <div class="row text-center name">
                        <div class="col">
						<?php
						if($db) {											
						$sqlu="select * from cities where id='1'";		
						$result=mysqli_query($db,$sqlu);							
						if($row=mysqli_fetch_array($result)){						
							$name=mysqli_real_escape_string($db,$row['Name']);	
							$desc=mysqli_real_escape_string($db,$row['Description']);
							$price =mysqli_real_escape_string($db,$row['Price']);
							$cust =mysqli_real_escape_string($db,$row['CustCount']);
							echo "$name<br>";
							echo "$desc<br>";
							echo "Average of customers : $cust<br>";
							echo  "<center>Price: $price</center><br>";
					  
					
		}else{
			"<p>This service does not exist</p>";
		}
			
		}else{
			"<p>An error occured!</p>";
		}
		?>
                        </div>
                    </div>
                </div>
				<div class="card-footer text-center ">
                    <div class="row">
                        <div class="col"> 
						<a href="appointments.php" class="button">Add to Booking</a>
						 </div>
                    </div>
                    <hr class="my-1">
                </div>
            </div>
        </div>
		<div class="col-sm mt-5 mx-5">
            <div class="card mt-3 h-100">
                <div class="card-header  text-center  ">
                    <div class="row justify-content-center ">
                        <div class="col">  </div>
                    </div>
                    <div class="row text-center name">
                        <div class="col">
						<?php
		if($db) {											
				$sqlu="select * from cities where id='2'";		
				$result=mysqli_query($db,$sqlu);							
				if($row=mysqli_fetch_array($result)){						
					$name=mysqli_real_escape_string($db,$row['Name']);	
					$desc=mysqli_real_escape_string($db,$row['Description']);
					$price =mysqli_real_escape_string($db,$row['Price']);
					$cust =mysqli_real_escape_string($db,$row['CustCount']);
					echo "$name<br>";
					echo "$desc<br>";
					echo "Average of customers : $cust<br>";
					echo  "<center>Price: $price</center><br>";
					  
					
		}else{
			"<p>This service does not exist</p>";
		}
			
		}else{
			"<p>An error occured!</p>";
		}
		?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center ">
                    <div class="row">
                        <div class="col"> 
						<a href="appointments.php" class="button">Add to Booking</a>
						 </div>
                    </div>
                    <hr class="my-1">
                </div>
            </div>
        </div>
        <div class="col-sm mt-5 mx-5">
            <div class="card mt-3 h-100">
                <div class="card-header  text-center ">
                    <div class="row justify-content-center ">
                        <div class="col">  </div>
                    </div>
                    <div class="row text-center name">
                        <div class="col">
						<?php
		if($db) {											
				$sqlu="select * from cities where id='3'";		
				$result=mysqli_query($db,$sqlu);							
				if($row=mysqli_fetch_array($result)){						
					$name=mysqli_real_escape_string($db,$row['Name']);	
					$desc=mysqli_real_escape_string($db,$row['Description']);
					$price =mysqli_real_escape_string($db,$row['Price']);
					$cust =mysqli_real_escape_string($db,$row['CustCount']);
					echo "$name<br>";
					echo "$desc<br>";
					echo "Average of customers : $cust<br>";
					echo  "<center>Price: $price</center><br>";
					  
					
		}else{
			"<p>This service does not exist</p>";
		}
			
		}else{
			"<p>An error occured!</p>";
		}
		?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="col"> 
						<a href="appointments.php" class="button">Add to Booking</a>
						 </div>
                    </div>
                    <hr class="my-1">
                </div>
            </div>
        </div>
		<div class="col-sm mt-5 mx-5">
            <div class="card mt-3 h-100">
                <div class="card-header  text-center ">
                    <div class="row justify-content-center ">
                        <div class="col">  </div>
                    </div>
                    <div class="row text-center name">
                        <div class="col">
						<?php
		if($db) {											
				$sqlu="select * from cities where id='4'";		
				$result=mysqli_query($db,$sqlu);							
				if($row=mysqli_fetch_array($result)){						
					$name=mysqli_real_escape_string($db,$row['Name']);	
					$desc=mysqli_real_escape_string($db,$row['Description']);
					$price =mysqli_real_escape_string($db,$row['Price']);
					$cust =mysqli_real_escape_string($db,$row['CustCount']);
					echo "$name<br>";
					echo "$desc<br>";
					echo "Average of customers : $cust<br>";
					echo  "<center>Price: $price</center><br>";
					  
					
		}else{
			"<p>This service does not exist</p>";
		}
			
		}else{
			"<p>An error occured!</p>";
		}
		?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="col"> 
						<a href="appointments.php" class="button">Add to Booking</a>
						 </div>
                    </div>
                    <hr class="my-1">
                </div>
				</div>
</div>






    </div>
</div>
	</div>

</body>
</html>