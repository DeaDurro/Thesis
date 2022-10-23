<?php
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'ddurro18', 'deaduro3', 'web16_ddurro18');

// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('id','Name','Price','Description','CustCount','Modify');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// Get the result...
if ($result = $mysqli->query('SELECT * FROM cities ORDER BY ' .  $column . ' ' . $sort_order)) {
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
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
			<link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
			<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
			<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>
			<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 10px;
			}
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
            <li class="nav-item">
            <a class="nav-link" href="client.php">
            <i class="material-icons">supervisor_account</i>
              <p>Commuters</p>
            </a>
            <li class="nav-item">
            <a class="nav-link" href="vehicle.php">
            <i class="material-icons">badge</i>
              <p>Vehicles</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="routes.php">
            <i class="material-icons">supervisor_account</i>
              <p>Routes</p>
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
     
			<table>
				<tr>
					<th><a href="client.php?column=name&order=<?php echo $asc_or_desc; ?>">id<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="client.php?column=age&order=<?php echo $asc_or_desc; ?>">Name<i class="fas fa-sort<?php echo $column == 'age' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="client.php?column=joined&order=<?php echo $asc_or_desc; ?>">Price<i class="fas fa-sort<?php echo $column == 'joined' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="client.php?column=joined&order=<?php echo $asc_or_desc; ?>">Description<i class="fas fa-sort<?php echo $column == 'joined' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="client.php?column=joined&order=<?php echo $asc_or_desc; ?>">CustCount<i class="fas fa-sort<?php echo $column == 'joined' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="client.php?column=joined&order=<?php echo $asc_or_desc; ?>">Modify<i class="fas fa-sort<?php echo $column == 'joined' ? '-' . $up_or_down : ''; ?>"></i></a></th>
				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td<?php echo $column == 'name' ? $add_class : ''; ?>><?php echo $row['id']; ?></td>
					<td<?php echo $column == 'age' ? $add_class : ''; ?>><?php echo $row['Name']; ?></td>
					<td<?php echo $column == 'joined' ? $add_class : ''; ?>><?php echo $row['Price']; ?></td>
					<td<?php echo $column == 'joined' ? $add_class : ''; ?>><?php echo $row['Description']; ?></td>
					<td<?php echo $column == 'joined' ? $add_class : ''; ?>><?php echo $row['CustCount']; ?></td>
					<td<?php echo $column == 'joined' ? $add_class : ''; ?>><?php echo "<a href='editservice.php?id={$row['id']}'>Edit</a>" ?></td>
				</tr>
				<?php endwhile; ?>
			</table>
			
			<center><a href="newservice.php">Add New City Service</a><p> </p><a href="admin.php">Go back to dashboard</a></center>
			
        </div>
		</body>
	</html>
	<?php
	$result->free();
}
?>