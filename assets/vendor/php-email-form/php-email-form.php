<?php

if(isset($_POST)){
	$formok = true;

	//form data

	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$message = htmlspecialchars($_POST['subject']);

	//validation
	if(empty($name) || empty($email) || empty($subject)){
		$formok = false;
	}

	if($formok){
		$headers = "From: info@nandccontractors.com" . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$emailbody = "<p>You have recieved a new message from the enquiries form on your website.</p>
                  <p><strong>Name: </strong> {$name} </p>
                  <p><strong>Email Address: </strong> {$email} </p>
                  <p><strong>Subject: </strong> {$subject} </p> ";

    mail("sales@nandccontractors.com","New Enquiry",$emailbody,$headers);

	}

        //redirect back to form
        header('location: ' . $_SERVER['HTTP_REFERER']);

}

 ?>