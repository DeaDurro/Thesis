<?php
header("X-XSS-Protection: 1; mode=block");

session_start();				//start the session 
//Login Code
if(isset($_POST['submit'])){				//if the user has pressed submit	
      session_regenerate_id();
      $_SESSION['submit'] = TRUE;
	  
	 $berr=false;                            //No error in the beginning
	if(!isset($_POST['user'])){				//if the user has not entered the username
		$berr=true; 						//Then there is an error
		$err['user']="No Input";			//So, use the error message for the username: no input
	}
	if(!isset($_POST['pass'])){				//Same procedure for the password input field
		$berr=true;
		$err['pass']="No Password";
	}
	
	include 'conf.php';						//include the conf file which makes the link to the database with localhost,name,password and name of database
	$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);				//Create a variable db that will connect to all the information of the database
	$user = mysqli_real_escape_string($db, $_POST['user']);//will properly escape the user’s input to block an sql injection attack
	$pass = mysqli_real_escape_string($db, $_POST['pass']);
	if($db&&!$berr) {											//If this variable is connected to the db and there is no error from the input fields
		$sql="SELECT *											
				FROM `userinfo` 
				WHERE `username`='{$user}' 
				and `password`='{$pass}';";
		$result=mysqli_query($db,$sql);							//Database is connected with the query, after we selected the row corresponding to user's info
		if(mysqli_num_rows($result)==1){						//If there is 1 row generated from the database
			$row=mysqli_fetch_array($result);					//get this row from the database as an array of elements
			$msg= "Level is ".htmlentities($row['level']);					//Show at first the level of user(0,1) if user or admin
			$_SESSION['level']=$row['level'];					//Assign to the session variables the level,id and full name that can go the next pages
			$_SESSION['id']=$row['id'];
			$_SESSION['fname']=$row['name']." ".$row['surname'];
			if($_SESSION['level']==1){
				header("refresh:0; url=Commuter.php");	
			}else if($_SESSION['level']==0){
				header("refresh:0; url=admin.php");	
			}
			//header("refresh:0; url=home.php");					//Refreshing for 1 second and then redirecting to index.php page
			//This part is for logging in!!!
		} else {
			$berr=true;											//If there is an error
			$err['login']="<h5>Username and Password did not match!!!</h5>";			//Say that the db could not connect the username with the password
		}
	}
}
?>
<!DOCTYPE html>
<html>
        <head>
			<title>Login Page</title>
			<link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>
    <body>
	<style>
	body{
		background-image: url('vehicle.jpg');
		background-attachment:fixed;
		background-repeat: no-repeat;
		background-size: cover;
	}
	#formWrapper{
		margin-left: -90px;
		background-color: black;
		color: white;
		
	}
	h1{
		color: white;
	}

</style>
        </head>
    <body>
       
        <?php
        if(isset($_POST['submit'])&&!$berr){
            echo $msg;								//When pressing submit the message(the level) should be echoed
		} else { ?>

			<div id=formWrapper>
				<div id="title"> 
				<h1 style="color:#f3d495;">Log in Public Transport</h1>
			
				</div>
				<div class="login">
					<form action="<?=$_SERVER['PHP_SELF']?>" method="post" >
					<div class="inputBox">
					
						 <input type="text" name="user" 
							value="<?=isset($_POST['user'])?$_POST['user']:""?>" placeholder="Username"/>
							<?=isset($err['user'])? $err['user']:""?> 
					</div>
					<div class="inputBox">
					
						 <input type="password" name="pass" placeholder="Password"/>
							<?=isset($err['pass'])? $err['pass']:""?>
					</div>
						<input type="submit" name="submit" value="Log In"/>
							<?=isset($err['login'])? $err['login']:""?>
					</form>

					<p>Don't have an account? <a href="register.php">Sign up</a></p>
				</div>
			
			<?php 
			}
			?>
		</div>
        

    </body>
</html>