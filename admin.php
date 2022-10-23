<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Public Transport - Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
 

  <link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>

</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    -->
      <div class="logo">
        <h3 class="simple-text logo-normal">
         <a href="profileadmin.php">  Admin Profile</a>
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
      <div class="container">
  <!-- Content here -->
  <div class="row gx-5 mt-5 mx-1">
    <div class="col  ">
     <div class=" card p-5 bg-white border-left border-primary  border-5 ">
    
     <a href="client.php"> Commuters </a>
     </div>
    </div>
    <div class="col ">
      <div class="card p-5 bg-white border-left border-warning">
      <a href="vehicle.php"> Vehicle </a>
      </div>
    </div>

    <div class="col">
      <div class="card p-5 bg-white border-left  border-info">
      <a href="routes.php"> Routes </a>
      </div>
    </div>
    <div class="col">
      <div class="card p-5  bg-white border-left border-secondary">
      <a href="adminapp.php"> Bookings </a>
      </div>
    </div>
  </div>

  <div class="row gx-5 mt-5 mx-1">
    
    <div class="col">
      <div class="card p-5  bg-white border-left border-danger">
      <a href="showservices.php"> Inter Urban Routes </a>
      </div>
    </div>
    
    <div class="col">
      <div class="card p-5 bg-white border-left  border-info">
      <a href="financialinfo.php"> Financial Information(pdf) </a>
      </div>
    </div>
	
  </div>
      </div>

      </div>
    </div>
  </div>
</body>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/esm/popper.min.js'></script>
<script src='https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js'></script>

</body>
</html>
