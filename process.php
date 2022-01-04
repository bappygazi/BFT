<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$to = "info@baresfuertoner.de";
	
	// Redirect to home page if directly accessed

$homePage = "./index.html";
   
if (!isset($_REQUEST['email'])) {
   header( "Location: $homePage" );
}

   // Check for email injection
   
   function isInjected($str) {
      $injections = array('(\n+)',
      '(\r+)',
      '(\t+)',
      '(%0A+)',
      '(%0D+)',
      '(%08+)',
      '(%09+)'
      );
      $inject = join('|', $injections);
      $inject = "/$inject/i";
      if(preg_match($inject,$str)) {
         return true;
      }
      else {
         return false;
      }
   }
	
	$subject = "form Submission Enquirey";
	//if(isset($_POST['submitbtn']) )
   //{
	
		$usrSubject = $_POST['form-subject'];
	
		$name = $_POST['form-name'];
		$email = $_POST['form-email'];
		$company = $_POST['form-company'];
		$subject = "[Contact Response] $usrSubject";
		$message = $_POST['message'];
		
		$txt = "
			<table border=0 style='width:100%;'>
				<tr>
					<td>Name:</td>
					<td style='width:90%'>$name</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td style='width:90%'>$email</td>
				</tr>
				<tr>
					<td>Company:</td>
					<td style='width:90%'>$company</td>
				</tr>
				<tr>
					<td>Subject:</td>
					<td style='width:90%'>$usrSubject</td>
				</tr>
				<tr>
					<td>Message:</td><td style='width:90%'>$message</td>
				</tr>
			</table>";
			
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From:'.$name. '<info@baresfuertoner.de>' . "\r\n";
		$headers .=  "Reply-To: $email" . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
					
		   // Redirect to current page if injected
   
   if ( isInjected($name) || isInjected($email)  || isInjected($company) || isInjected($subject) || isInjected($message)) {
   header( "Location: $homePage" );
   echo "mail not sent error";
   }
					
		elseif(isset($_POST['form-date']) && !empty($_POST['form-date'])) {
			die();
		}elseif(mail($to,$subject,$txt,$headers)){
			echo "Mail sent successfully";
		}else{
			echo "Mail not sent error";
		}
   }
?>