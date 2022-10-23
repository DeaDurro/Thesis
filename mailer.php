<?php

require 'PHPMailerAutoload.php';

		$mysql_hostname = 'localhost';
		$mysql_username = 'ddurro18';
		$mysql_password = 'deaduro3';
		$mysql_dbname = 'web16_ddurro18';
		
		$dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
         $stmt = $dbh->prepare("SELECT id, name, email FROM userinfo");

        /*** execute the prepared statement ***/
        $stmt->execute();

        while($row = $stmt->fetch()) {
            //$id = $row['id'];
			$name = $row['name'];
			$email = $row['email'];
			
			
			sendEmail($email, $name);
		
        }
		 
	function sendEmail($email, $name){

		$mail = new PHPMailer;

		echo $htmlversion="<p style='color:red;'>Hi ".$name.", <br> </p>";
		echo $htmlversion="<p style='color:black;'>Book your subscription for public transport whole year with discount ";
		$mail->isSMTP();                                     		 // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  								// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                                // Enable SMTP authentication
		$mail->Username = 'transportationagency4@gmail.com';         			  // SMTP username
		$mail->Password = 'publict2022.';                      // SMTP password
		$mail->Port = 587;                                   // TCP port to connect to
		$mail->setFrom('transportationagency4@gmail.com', 'Public Transport');
		$mail->addAddress($email);               // Name is optional
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Discounts in subscriptions. Hurry Up to save money and use more public transportation!';
		$mail->Body    = $htmlversion;
		

	if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo '<br>Message has been sent to User name : '.$name.' Email:  '.$email.'<br><br>';
	}
}
?>