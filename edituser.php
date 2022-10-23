<?php
header("X-XSS-Protection: 1; mode=block");
include_once 'check.php';
include_once 'conf.php';
if(isset($elog)) {
	echo "Nothing";
} else {
	
	if(isset($_GET['id'])){
		if($_GET['id']==$_SESSION['id'] || $_SESSION['level']==0){//Check whether I am the user or if I am Admin
			$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);		//Connect to the db
			if($db) {											//If connected to the db
				$sqlu="select * from userinfo where id='{$_GET['id']}'";		//Select the user with the id from the url correspondig to the same from the db
				$result=mysqli_query($db,$sqlu);							//Result comes from query
				if($row=mysqli_fetch_array($result)){						//Get the specific row with the data extracted from the specific id of the user
					$name=mysqli_real_escape_string($db,$row['name']);										//Get each field of the sql and assign them to a variable
					$surname=mysqli_real_escape_string($db,$row['surname']);
					$username=mysqli_real_escape_string($db,$row['username']);
					$password=mysqli_real_escape_string($db,$row['password']);
					$email=mysqli_real_escape_string($db,$row['email']);
					$phonenumber=mysqli_real_escape_string($db,$row['phonenumber']);
					
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
				} else $name=htmlentities($_POST['name']);														//Else the new input is assigned to the name
		} else { $err['name']="<p class=\"err\">There is no data input</p>"; $berr=true;}			//If the user has not entered anything
		if(isset($_POST['surname'])){																//The same as the surname
			if(!ctype_alpha($_POST['surname'])) { $berr=true;
				$err['surname']="<p class=\"err\">Surname must contain only letters</p>"; 
				} else $surname=htmlentities($_POST['surname']);
		} else {$err['surname']="<p class=\"err\">There is no data input</p>";$berr=true;}
		if(isset($_POST['username'])){															//The username field
			if(!preg_match("/^[a-z\d\.-_]+$/i",$_POST['username'])) { $berr=true;
				$err['username']="<p class=\"err\">Username must contain only letters, numbers and . - _</p>";
				}else $username=htmlentities($_POST['username']);
		} else {$err['username']="<p class=\"err\">There is no data input</p>";$berr=true;}
		if(isset($_POST['password'])){															//The password field
			if(!(preg_match("/^.{8,16}$/",$_POST['password']) && preg_match("/[A-Z]+/",$_POST['password'])&& preg_match("/[a-z]+/",$_POST['password'])&& preg_match("/\d+/",$_POST['password']))) { $berr=true;
				$err['password']="<p class=\"err\">Password must contain must contain 8-16 characters, at least 1 uppercase letter, 1 lower case letter and 1 number</p>";
				} else $password=htmlentities($_POST['password']);
				$password=htmlentities($_POST['password']);
		}
		if(isset($_POST['email'])){
			if(!preg_match("/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i",$_POST['email'])) { 
				$berr=true;
				$err['email']="<p class=\"err\">Email must be valid!!</p>";}
				else{ $email=htmlentities($_POST['email']);}
			} else {$err['email']="<p class=\"err\">There is no data input</p>";$berr=true;}
			
			if(isset($_POST['phonenumber'])){
			if(!preg_match("/^6+[7-9]{1}+[0-9]{7}$/i",$_POST['phonenumber'])) { 
				$berr=true;
				$err['phonenumber']="<p class=\"err\">Number must be valid!!</p>";}
				else{$phonenumber=htmlentities($_POST['phonenumber']);}
			} else {$err['phonenumber']="<p class=\"err\">There is no data input</p>";$berr=true;}


						
		
		
		
		
		//Updating in the database
		if(!$berr){//Process for database
			$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);						//Connect to the db
			if($db){														//Get the db and update all the records
				$sql= "UPDATE userinfo SET name = '" . $name . "', surname = '" . $surname . "',
				username = '" . $username. "',password = '" . $password. "',"."email = '" . $email . "',
				phonenumber = '" . $phonenumber . "'
				 WHERE id={$_GET['id']};";					//Link it to that specific id of the user we are editing
				echo $sql;//For Debugging
				if(mysqli_query($db,$sql)){					//If the database has generated our sql
					$msg= "<h1>Successfully Updated</h1>";						//Show the user the message that we have successfully updated
					header("refresh:1;url=client.php");							//Go the the index page where the update will be visible in the table
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
<head><title>Edit User Page - <?=isset($name)?$name." ".$surname:""?></title>
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
 
    <div class="main-panel">
        <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="Commuter.php">Dashboard</a>
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
                <a class="nav-link" href="Commuter.php">
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
	  <h1>Edit Profile</h1> <br>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>?id=<?=isset($_GET['id'])?$_GET['id']:$_SESSION['id']?>" enctype="multipart/form-data">
	Name: <input type="text "name="name" 
		value="<?=isset($name)?$name:""?>"></br>
	<?=isset($err['name'])? $err['name']:""?>
	Surname: <input type="text "name="surname" value="<?=isset($surname)?$surname:""?>"></br>
	<?=isset($err['surname'])? $err['surname']:""?>
	Username: <input type="text " name="username" value="<?=isset($username)?$username:""?>"></br>
	<?=isset($err['username'])? $err['username']:""?>
	Password: <input type="text "name="password" value="<?=isset($password)?$password:""?>"></br>
	<?=isset($err['password'])? $err['password']:""?>
	Email: <input type="text "name="email" value="<?=isset($email)?$email:""?>"></br>
	<?=isset($err['email'])? $err['email']:""?>
	Phone Number: <input type="text "name="phonenumber" value="<?=isset($phonenumber)?$phonenumber:""?>"></br>
	<?=isset($err['phonenumber'])? $err['phonenumber']:""?>
	
	<input type="submit" name="submit" value="Update">
	<?=isset($err['db'])? $err['db']:""?>
</form>
</div>
</div>
</body>
</html>
<?php } ?>
		