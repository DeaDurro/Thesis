<?php
header("X-XSS-Protection: 1; mode=block");
session_start();				//start the session 

//include_once 'check.php';							//Include the check and conf file to see if logged in and connect to the db
include_once 'conf.php';
if(isset($elog)) {									//If an error has occured in the login
	echo "Nothing";									//Show nothing to the user
} else {
	if(isset($_POST['submit'])){					//If the user has pressed submit
		$berr=false;								//No error in the beginning before the checks
		if(isset($_POST['name'])){					//If the user has set the name, same with the surname
			if(!ctype_alpha($_POST['name'])) { $berr=true;							//See if it is number or letter
				$err['name']="<p class=\"err\">Name must contain only letters</p>"; }
		} else { $err['name']="<p class=\"err\">There is no data input</p>"; $berr=true;}
		if(isset($_POST['surname'])){
			if(!ctype_alpha($_POST['surname'])) { $berr=true;
				$err['surname']="<p class=\"err\">Surname must contain only letters</p>"; }
		} else {$err['surname']="<p class=\"err\">There is no data input</p>";$berr=true;}
		if(isset($_POST['username'])){
			if(!preg_match("/^[a-z\d\.-_]+$/i",$_POST['username'])) { $berr=true;
				$err['username']="<p class=\"err\">Username must contain only letters, numbers and . - _</p>";}
		} else {$err['username']="<p class=\"err\">There is no data input</p>";$berr=true;}
		if(isset($_POST['password'])){	
			if(!(preg_match("/^.{8,16}$/",$_POST['password']) && preg_match("/[A-Z]+/",$_POST['password'])&& preg_match("/[a-z]+/",$_POST['password'])&& preg_match("/\d+/",$_POST['password']))) { $berr=true;
				$err['password']="<p class=\"err\">Password must contain must contain 8-16 characters, at least 1 uppercase letter, 1 lower case letter and 1 number</p>";}
		} else {$err['password']="<p class=\"err\">There is no data input</p>";$berr=true;}
		if(isset($_POST['email'])){
			if(!preg_match("/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i",$_POST['email'])) { 
				$berr=true;
				$err['email']="<p class=\"err\">Email must be valid!!</p>";}
			} else {$err['email']="<p class=\"err\">There is no data input</p>";$berr=true;}
		if(isset($_POST['number'])){
			if(!preg_match("/^06+[7-9]{1}+[0-9]{7}$/i",$_POST['number'])) { 
				$berr=true;
				$err['number']="<p class=\"err\">Number must be valid!!</p>";}
			} else {$err['number']="<p class=\"err\">There is no data input</p>";$berr=true;}
		
		
		if(!$berr){//Process for database
			$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);						//Connect to the database
			$name = mysqli_real_escape_string($db, $_POST['name']);
		    $surname = mysqli_real_escape_string($db, $_POST['surname']);			
			$username = mysqli_real_escape_string($db, $_POST['username']);
		    $password = md5(mysqli_real_escape_string($db, $_POST['password']));
			$email = mysqli_real_escape_string($db, $_POST['email']);
		    $number = mysqli_real_escape_string($db, $_POST['number']);	
			
			
			if($db){															//If connected insert a new user with the following data
				$sql="INSERT INTO `userinfo` (`id`, `name`, `surname`, `username`, `password`, `level`, `email`, `phonenumber`) 
						VALUES (NULL, '{$name}', '{$surname}', 
						'{$username}', '{$password}', '1', 
						 '{$email}','{$number}' );";
				//echo $sql;//For Debugging
				if(mysqli_query($db,$sql)){								//If a row is selected
					echo "<h1>Successfully Created</h1>";				//Say that the user is created
					$_SESSION['level']=1;
					$_SESSION['name']=$name;
					//$_SESSION['id']=$row['id'];
					$_SESSION['fname']=$name." ".$surname;
					header("refresh:0;url=Commuter.php");					//Refresh after 1 second and go the index page which redirects to the admin page
				} else {
					$berr=true;											//Else error is true
					$err['db']="Something happen with insertion in DB!!!";				//Say that something happened with the insertion
				}
			} else { $berr=true;
				$err['db']="Database Connection Failed";						//Else say that connection was not made
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
			<style>
			.err {color: red;}
			</style>
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
	if(!(isset($berr)&&!$berr)){ ?>
	<
			<div id=formWrapper>
				<div id="title"> 
					<h1 style="color:#f3d495;">Register Public Transport</h1> 
				</div>
		<div class="register">
		<form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
		 <input type="text "name="name" placeholder="Name"
				value="<?=isset($name)?$name:""?>"></br>
			<?=isset($err['name'])? $err['name']:""?>
			 <input type="text "name="surname" placeholder="Surame"value="<?=isset($surname)?$surname:""?>" ></br>
			<?=isset($err['surname'])? $err['surname']:""?>
		     <input type="text " name="username" placeholder="Username" value="<?=isset($username)?$username:""?>"></br>
			<?=isset($err['username'])? $err['username']:""?>
			<input type="password"name="password" placeholder="Password" value="<?=isset($password)?$password:""?>"></br>
			<?=isset($err['password'])? $err['password']:""?>
			<input type="text "name="email" placeholder="Email"value="<?=isset($email)?$email:""?>"></br>
			<?=isset($err['email'])? $err['email']:""?>
			 <input type="text "name="number" placeholder="Phone Number" value="<?=isset($number)?$number:""?>"></br>
			<?=isset($err['number'])? $err['number']:""?>

			<input type="submit" name="submit" value="Register">
			
			<?=isset($err['db'])? $err['db']:""?>
		</form>
		
	</div>
	
	<?php } } ?>
	</div>
	</body>
</html>