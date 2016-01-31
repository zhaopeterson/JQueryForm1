<?php
if(($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))):
	// var_dump($_POST);
	$formerrors = false;

	if (isset($_POST['email'])) $email = $_POST['email'];
	if (isset($_POST['creditcard'])) $creditcard = $_POST['creditcard'];
	if (isset($_POST['telephone'])) $telephone = $_POST['telephone'];
	if (isset($_POST['month'])) $month = $_POST['month'];
	if (isset($_POST['year'])) $year = $_POST['year'];
	if (isset($_POST['ajaxrequest'])) $ajaxrequest = $_POST['ajaxrequest'];

	if ($email === "" ) :
		$err_email = '<div class="error">Sorry, your name is a required field</div>';
		$formerrors = true;
	endif;

	if ($creditcard === "" ) :
		$err_creditcard = '<div class="error">Sorry, your credit card number is a required field</div>';
		$formerrors = true;
	endif;		

	if ((strlen(intval($creditcard)) > 16 || strlen(intval($creditcard)) < 13 ) || !preg_match('/[0-9]/', $creditcard)):
		$err_creditcard = '<div class="error">Credit card number not the correct length or contains other characters</div>';
		$formerrors = true;
	endif;


	if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
		$err_email = '<div class="error">Not valid email address</div>';
		$formerrors = true;
	endif;
	$formdata =  array(
		'email' => $email,
		'telephone' => $telephone,
		'creditcard' => $creditcard,
		'experiationdate' => $month.$year
		);

	if(!($formerrors)):
		$to = "brookezpeterson@gmail.com";
		$subject = "From $email -- Signup for Island Green Tea";
		$message = json_encode($formdata);

		$replyto = "From: $email \r\n"."Reply-To: donotreply@islandgreentea.com";

		if (mail($to, $subject, $message)):
			$msg = "Thanks for filling out our form";
			if ( $ajaxrequest ) :
				echo "<script>$('#regform').before('<div id=\"formmessage\"><p>Thanks for filling out our form. We will send out the coupon shortly.</p></div>'); $('#regform').hide();</script>";
		  endif;
		else:
			$msg = "Problem sending the message";
		endif;

	endif;

endif;//end if
?>