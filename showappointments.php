<?php

include_once 'check.php';
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'ddurro18', 'deaduro3', 'web16_ddurro18');

// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('appID','date','hour','clientname','clientsurname','clientemail','type');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

$sqlu="select * from userinfo where id='{$_SESSION['id']}'";		//Select the user with the id from the url correspondig to the same from the db
				$result=mysqli_query($mysqli,$sqlu);							//Result comes from query
				$row=mysqli_fetch_array($result);						//Get the specific row with the data extracted from the specific id of the user
					$name=$row['name'];										//Get each field of the sql and assign them to a variable
					$surname=$row['surname'];
// Get the result...
if ($result2 = $mysqli->query('SELECT * FROM bookings where date>CURDATE() and clientname="' .  $name . '" AND clientsurname="' .  $surname . '" ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	$up_or_down2 = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc2 = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class2 = ' class="highlight"';				

// Get the result...
if ($result = $mysqli->query('SELECT * FROM bookings where date=CURDATE() and clientname="' .  $name . '" AND clientsurname="' .  $surname . '" ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Public Transport</title>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>
			<style>
			
			#appointment{
				position: absolute;
 				top: 20%;
  				left: 60%;
  				transform: translate(-50%, -50%) ;
  				padding: 30px;
				display: block;
                text-align: center;
			}
			table {
				
				border-collapse: collapse;
				width: 70%;
			}
			th {
				background-color: #2986cc;
				border: 1px solid #2986cc;
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
            
           .center a {
			
            color: #fcf6ba;
            font-weight: bold;
            font-size: 25px;
            text-decoration: none;
          }
          .center a:hover {
                color: #231f20;
                text-decoration: none;
          }
			</style>
		</head>
		<body>

		<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="yellow">
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
            <a class="nav-link" href="">
            <i class="material-icons">badge</i>
              <p>Urban Lines</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="">
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
        <div class="content-area" >
        <div  id=appointment> 
		<h1>Your Appointments for today</h1> <br>
		<center class="center"><a href="book.php">Go back to Booking page</a></center> <br>
			<table>
				<tr>
					<th><a href="showappointments.php?column=name&order=<?php echo $asc_or_desc; ?>"> Booking ID<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="showappointments.php?column=age&order=<?php echo $asc_or_desc; ?>">Date<i class="fas fa-sort<?php echo $column == 'age' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="showappointments.php?column=joined&order=<?php echo $asc_or_desc; ?>">Hour<i class="fas fa-sort<?php echo $column == 'joined' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="showappointments.php?column=joined&order=<?php echo $asc_or_desc; ?>">Client Name<i class="fas fa-sort<?php echo $column == 'joined' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="showappointments.php?column=joined&order=<?php echo $asc_or_desc; ?>">Client Surname<i class="fas fa-sort<?php echo $column == 'joined' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="showappointments.php?column=joined&order=<?php echo $asc_or_desc; ?>">Client Email<i class="fas fa-sort<?php echo $column == 'joined' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="showappointments.php?column=joined&order=<?php echo $asc_or_desc; ?>">Type<i class="fas fa-sort<?php echo $column == 'joined' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
				
					<td<?php echo $column == 'name' ? $add_class : ''; ?>><?php echo $row['appID']; ?></td>
					<td<?php echo $column == 'age' ? $add_class : ''; ?>><?php echo $row['date']; ?></td>
					<td<?php echo $column == 'joined' ? $add_class : ''; ?>><?php echo $row['hour']; ?></td>
					<td<?php echo $column == 'joined' ? $add_class : ''; ?>><?php echo $row['clientname']; ?></td>
					<td<?php echo $column == 'joined' ? $add_class : ''; ?>><?php echo $row['clientsurname']; ?></td>
					<td<?php echo $column == 'joined' ? $add_class : ''; ?>><?php echo $row['clientemail']; ?></td>
					<td<?php echo $column == 'joined' ? $add_class : ''; ?>><?php echo $row['type']; ?></td>
				</tr>
				<?php endwhile; ?>
			</table>
			
		
                </div>
                </div>
		</body>
	</html>
	<?php
	$result->free();
}
}
?>