<?php
include_once('conf.php');
header("Content-Type: application/vnd.ms-excel; charset=utf-8");

header("Content-Disposition: attachment; filename=vehicle.xls");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("Cache-Control: private",false);

$data = array();					//Creating the data array
		$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);	//Connect to the db
		if($db){							//If we are connected
		$sql = 'SELECT * FROM route;';			//Get all the row and columns of the db
		
		$result=mysqli_query($db,$sql);			//Get the result of connection between the db and the rows
		while($row=mysqli_fetch_row($result)){		//While we still have rows to read
		$data[] = $row;						//Assign to the data the data of the row	
		}
		
		}else{						//Else show that we had no connection
			"No connection";
		}
		echo "\tRoute Info";
		echo "\n";
	echo "\trid \tlinename \tstart \tfinish \ttime";			//Creating the header
	echo "\n";									//New line for the data from the db
	foreach($data as $r){				//Loop through the array data
	
		echo " \t$r[0]";				//Output the id first and then the others
		echo " \t $r[1]";	//Name
		echo " \t $r[2]";	//start
		echo " \t $r[3]";	//finish
		echo " \t $r[4]";	//time
	
	
		
		echo "\n";
	}

?>
