
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adminstyle.css"/> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>

<style>
{box-sizing:border-box;}
body{font-family: 'Open Sans', sans-serif; color:#333; font-size:14px; background-color:#dadada; padding:100px;}
.form_box{width:400px; padding:10px; background-color:white;}
input{padding:5px;  margin-bottom:5px;}
input[type="submit"]{border:none; outlin:none; background-color:#679f1b; color:white;}
.heading{background-color:#ac1219; color:white; height:40px; width:100%; line-height:40px; text-align:center;}
.shadow{
  -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
-moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);}
.pic{text-align:left; width:33%; float:left;}
</style>
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

    <style>

#profile{
				position: absolute;
 				top: 20%;
  				left: 60%;
  				transform: translate(-50%, -50%) ;
  				padding: 100px;
				display: block;
                text-align: center;
			}
        
	</style>
 <div id="profile">
 <form method="post" >
 <div class="heading">
  <h2> Feedback Form </h2>
 </div>
 <br/>
 <p>What do you think about the quality of service?</p>
 <div>
   <div class="pic">
     <img src="bad.png" alt=""> <br/>
     <input type="radio" name="quality" value="0"> Bad
   </div>
   <div class="pic">
     <img src="neutral.png" alt=""> <br/>
     <input type="radio" name="quality" value="1"> Okay
   </div>
   <div class="pic">
     <img src="good.png" alt=""> <br/>
     <input type="radio" name="quality" value="2"> Good
   </div>
 </div>
 
 <p>Do you have any suggestion for us? </p>
 <textarea name=" suggestion" rows="8" cols="40"></textarea></br>
  <input type="submit" name="submit" value="Submit Form">
</form>
<?php
$q_score = $_POST['quality'];
$feedback_txt = $_POST['suggestion'];
$conn = mysqli_connect('localhost', 'ddurro18', 'deaduro3', 'web16_ddurro18');
$query ="insert into feedback(quality_score, feedback)values($q_score, '$feedback_txt')";
$result = mysqli_query($conn, $query);
if($result)
  echo 'Thank you for your feedback. We\'ll appreciate!';
else
die("Something terrible happened. Please try again. ");
?>
 </div>
</body>
</html>