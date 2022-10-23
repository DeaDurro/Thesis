<?php

include_once 'check.php';
include_once 'conf.php';


$mysqli = new mysqli('localhost', 'ddurro18', 'deaduro3', 'web16_ddurro18');
if(isset($_GET['date'])){
    $date = $_GET['date'];
	$mysqli = new mysqli('localhost', 'ddurro18', 'deaduro3', 'web16_ddurro18');
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['hour'];
            }
            
            $stmt->close();
        }
    }
}
$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);		//Connect to the db
			if($db) {											//If connected to the db
					
					$sqlc="select * from userinfo where id='{$_SESSION['id']}'";
					$result2=mysqli_query($db,$sqlc);
					if($row2=mysqli_fetch_array($result2)){
						$cname=$row2['name'];
                        $csurname=$row2['surname'];
                        $cmail =$row2['email'];
						
					}
				
			}else{echo "No database connection";}

if(isset($_POST['submit'])){
    
	$timeslot = $_POST['timeslot'];
	$type = $_POST['myselectbox'];
	$stmt = $mysqli->prepare("select * from bookings where date = ? AND hour=?");
    $stmt->bind_param('ss', $date,$timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
			$msg = "<div class='alert alert-danger'>Already Booked</div>";
        }else{
			$stmtp = $mysqli->prepare("INSERT INTO `bookings`(`appID`, `date`,`hour`,`clientname`,`clientsurname`,`clientemail`,`type`) 
			VALUES (NULL, SYSDATE(),'{$timeslot}','{$cname}','{$csurname}','{$cmail}', '{$type}');");
			//$stmtp->bind_param('ss',$timeslot, $date);
			$stmtp->execute();
			$msg = "<div class='alert alert-success'>Booking Successfull</div>";
			$bookings[] = $timeslot;
			$stmt->close();
			$mysqli->close();
		}
    }
}

$duration = 20;
$cleanup = 0;
$start = "09:00";
$end = "15:00";

function timeslots($duration,$cleanup,$start,$end){
	$start = new DateTime($start);
	$end = new DateTime($end);
	$interval = new DateInterval("PT".$duration."M");
	$cleanupInterval = new DateInterval("PT".$cleanup."M");
	$slots = array();
	
	for($intStart=$start;$intStart<$end;$intStart->add($interval)->add($cleanupInterval)){
		$endPeriod = clone $intStart;
		
		$endPeriod->add($interval);
		if($endPeriod>$end){
			break;
		}
	
	$slots[] = $intStart->format("H:iA")."-".$endPeriod->format("H:iA");
	
	}
	
	return $slots;
	
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
	<link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>
		


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
	  <div class="content-area" id="book">
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
			<div class="col-md-12">
				<?php echo isset($msg)?$msg:""; ?>
			</div>
            <?php $timeslots = timeslots($duration,$cleanup,$start,$end);
			foreach($timeslots as $ts){
			?>
			<div class="col-md-2">
			<div class="form-group">
				<?php if(in_array($ts,$bookings)){ ?>
					<button class="btn btn-danger"><?php echo $ts;?></button>
				<?php }else{ ?>
					<button class="btn btn-success book" data-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button>
				<?php } ?>
				
			</div>
			</div>
			
			<?php } ?>
        </div>
    </div>
	</div>
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking<span id="slot"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
				<form action="" method="post">
					<div class="form-group">
						<label for="">Timeslot</label>
						<input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Name</label>
						<input required type="text"   readonly name="name" class="form-control" value="<?=isset($cname)?$cname:""?>"/>
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input required type="text"   readonly name="name" class="form-control" value="<?=isset($cmail)?$cmail:""?>"/>
					</div>
					<div class="form-group">
						<label for="">Select a Service</label>
						<select name="myselectbox">
					   <option name="Durres" value="Durres">Durres</option>
					   <option name="Fier" value="Fier"> Fier</option>					   
						<option name="Lezha" value="Lezha">Lezha</option>
						<option name="Shkodra" value="Shkodra">Shkodra</option>
					   <option name="Saranda" value="Saranda"> Saranda</option>					   
						<option name="Gjirokaster" value="Gjirokaster">Lezha</option>
						</select><br><br>
					</div>
					<div class="form-group pull-right">
						<button class="btn btn-warning" type="submit" name="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
      </div>
    </div>

  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
	 $(".book").click(function(){
		 var timeslot = $(this).attr('data-timeslot');
		 $("#slot").html(timeslot);
		 $("#timeslot").val(timeslot);
		 $("#myModal").modal("show");
	 })
	</script>
  </body>

</html>