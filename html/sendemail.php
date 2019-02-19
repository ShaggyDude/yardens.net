<?php

/* --------------------------------------------------------------------------
 *
 * file           : sendmail.php
 * Desc           : Sendmail Contact Form
 * Version        : 1.0
 * Date           : 07/12/2014
 * Author         : Imam Firmansyah
 * Author URI     : http://imamfirmansyah.com
 * Email          : imamfirmansyah27@gmail.com
 *
 * Copyright 2014. All Rights Reserved.
 * -------------------------------------------------------------------------- */

/* ==========================================================================
   Variables you can change
   ========================================================================== */

	// Enter your mail addres here
	$mailto   = "scott@romack.net"; 		 
	$name     = ucwords($_POST['name']);
	$subject  = $_POST['subject']; 				// Enter the subject here.
	$email    = $_POST['email'];
	$message  = $_POST['message'];
	$email_message = "";

	if(strlen($name) < 1 ){
		echo  'email_error';
	}

	else if(strlen($email) < 1 ) {
		echo 'email_error';
	}

	else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", $email)) {
		echo 'email_error';
	}

	else if(strlen($message) < 1 ){
		echo 'email_error';

	} else {

		// NOW SEND THE ENQUIRY
		$email_message .= "Name : ".$name."\n";
	    $email_message .= "Email : ".$email."\n";
	    $email_message .= "Subject : ".$subject."\n";
	 	$email_message .= "Message : ".$message."\n";

		$headers = 'From: '.$email."\r\n".'Reply-To: '.$name."\r\n" . 'X-Mailer: PHP/' . phpversion();

		mail($mailto, $subject, $email_message, $headers);
	}
?>
