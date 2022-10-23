<?php
include_once 'check.php';
include_once 'conf.php';
if(isset($elog)) {
	echo "Nothing";
} else {
	
	if(isset($_GET['id'])){
		if($_GET['id']==$_SESSION['id'] || $_SESSION['level']==0){//Check whether I am the user or if I am Admin
			$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);		//Connect to the db
			if($db) {											//If connected to the db
				$sqlu="select * from transportvehicle where tid='{$_GET['id']}'";		//Select the user with the id from the url correspondig to the same from the db
				$result=mysqli_query($db,$sqlu);							//Result comes from query
				if($row=mysqli_fetch_array($result)){						//Get the specific row with the data extracted from the specific id of the user
					$name=$row['name'];										//Get each field of the sql and assign them to a variable
					$vnumber=$row['vnumber'];
					
				
				} else {
					echo "The user with id: {$_GET['id']} does not exist...";		//If the row not generated then there is no user with this id
					header("refresh:2; url=index.php");								//If not found go within 2 seconds at index.php
					die();											
				}
			} 
		} else {
			echo "You do not have authorization to this person id";				//Check if we are user or admin
			header("refresh:2; url=index.php");									//If not then the go to the index page again, this person cannot enter to edit
			die();
		}
	} else header("Location: edit.php?id={$_SESSION['id']}");					//We are at edit php with the id which we get from the url
	if(isset($_POST['submit'])){												//If the user has pressed the update button, type submit
		$berr=false;															//No error in the beginning
		if(isset($_POST['name'])){												//Check for the name
			if(!ctype_alpha($_POST['name'])) { $berr=true;											//Let the user see the error message
				$err['name']="<p class=\"err\">Name must contain only letters</p>"; 
				} else $name=$_POST['name'];														//Else the new input is assigned to the name
		}  
		
		
		if(isset($_POST['vnumber'])){																//The same as the surname
			if(!preg_match('/^\d+$/',$_POST['vnumber'])) { $berr=true;
				$err['vnumber']="<p class=\"err\">Vehicle number must be only digit</p>"; 
				} else $vnumber=$_POST['vnumber'];
		} else {$err['vnumber']="<p class=\"err\">There is no data input</p>";$berr=true;}
		
		
		
		
		
		
		//Updating in the database
		if(!$berr){//Process for database
			$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);						//Connect to the db
			if($db){														//Get the db and update all the records
				$sql= "UPDATE transportvehicle SET name = '" . $name . "', vnumber = '" . $vnumber . "'
				 WHERE tid={$_GET['id']};";					//Link it to that specific id of the user we are editing
				echo $sql;//For Debugging
				if(mysqli_query($db,$sql)){					//If the database has generated our sql
					$msg= "<h1>Successfully Updated</h1>";						//Show the user the message that we have successfully updated
					header("refresh:1;url=staff.php");							//Go the the index page where the update will be visible in the table
				} else {
					$berr=true;												//Else we have an error
					$err['db']="Something happen with update in DB!!!";			//Couldnt get the desired outcome from the db
				}
			} else { $berr=true;												//If there is no connection to the db
				$err['db']="Database Connection Failed";
			}
		}
	}	
?>
<!DOCTYPE html>
<html>
<head><title>Edit Vehicle Page - <?=isset($name)?$name." ".$vnumber:""?></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
			<link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
			<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
			<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>
<style>
.err {color: red;}
#new{
	margin-left: 20%;
    position: absolute;
    display: block;
    justify-content: left;
    align-items: left;
}
input{

	display:block;
	padding:5px;
}
</style>
</head>
<body>
<?=isset($msg)?$msg:""?>
<div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    -->
      <div class="logo">
        <h3 class="simple-text logo-normal">
         Welcome 
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
            <i class="material-icons">badge</i>
              <p>Commuters</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="vehicle.php">
            <i class="material-icons">supervisor_account</i>
              <p>Vehicle</p>               
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
	  <div id="new">
	  <h1>Edit Vehicle</h1> <br>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>?id=<?=isset($_GET['id'])?$_GET['id']:$_SESSION['id']?>" enctype="multipart/form-data">
	Name: <input type="text "name="name" 
		value="<?=isset($name)?$name:""?>"></br>
	<?=isset($err['name'])? $err['name']:""?>
	
	Vehicle Number: <input type="text "name="payrate" value="<?=isset($vnumber)?$vnumber:""?>"></br>
	<?=isset($err['vnumber'])? $err['vnumber']:""?>
	
	

	
	
	<input type="submit" name="submit" value="Update">
	<?=isset($err['db'])? $err['db']:""?>
</form>
</div>
</div>
</body>
</html>
<?php } ?>