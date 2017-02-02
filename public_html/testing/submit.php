<?php
 
if(isset($_POST['email'])) {
    $email_to = "fungleow@gmail.com";
    $email_subject = "Nav's Tuitions Website Form";
 
 
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $message = $_POST['message'];

	$maths = $_POST['maths'];
	if ($maths != 'Yes') {
		$maths = 'No';
	}
	
	$science = $_POST['science'];
	if ($science != 'Yes') {
		$science = 'No';
	}	
	
	$english = $_POST['english'];
	if ($english != 'Yes') {
		$english = 'No';
	}	
	
	$legal = $_POST['legal'];
	if ($legal != 'Yes') {
		$legal = 'No';
	}
	
	$high_school = 'unchecked';
	$vce = 'unchecked';
	$adult = 'unchecked';	
	
	$selected_radio = $_POST['year'];
	if ($selected_radio == 'HighSchool') {
		$high_school = 'checked';
	}
	else if ($selected_radio == 'VCE') {
		$vce = 'checked';
	}
	else if ($selected_radio == 'Adult') {
		$adult = 'checked';
	}	


    $email_message = "<b>-- FORM DETAILS FROM NAV'S TUITIONS WEBSITE --</b><br><br>";
 
     
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "<b>Customer Details</b> <br>";
    $email_message .= "Name: ".clean_string($name)."<br>";
    $email_message .= "Contact: ".clean_string($contact)."<br>";
    $email_message .= "Email: ".clean_string($email)."<br><br>";
	
    $email_message .= "<b>Subject/s</b> <br>";
    $email_message .= "Maths: ".clean_string($maths)."<br>";
    $email_message .= "Science: ".clean_string($science)."<br>";
    $email_message .= "English: ".clean_string($english)."<br>";		
    $email_message .= "Legal Studies: ".clean_string($legal)."<br><br>";	
	
    $email_message .= "<b>Year Level</b> <br>";
    $email_message .= "High school (Years 7-10): ".clean_string($high_school)."<br>";
    $email_message .= "VCE (Years 11 & 12): ".clean_string($vce)."<br>";	
    $email_message .= "Adult courses/IELTS: ".clean_string($adult)."<br><br>";
 
    $email_message .= "<b>Comments / Message</b> <br>"; 
    $email_message .= "Message: ".clean_string($message)."<br>";
 
   
 
// create email headers
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  

?>

Page will be added soon =)
<?php
}
?>