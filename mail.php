<?php
 if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require ("class.phpmailer.php");
    
    // Redirect to home page if directly accessed

$homePage = "../index.html";
   
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
   
//if(isset($_POST['submitbtn1']) ){
        $fname=$_POST['form-name']; // Get fisrt Name value from HTML Form
        $email=$_POST['form-email'];  // Get Email Value
        $subject=$_POST['form-subject'];  // Get country Value
        $phone=$_POST['form-telefon'];  // Get Mobile No
        $message=$_POST['message']; // Get code Value
         
         
        $mail = new PHPMailer();
        $mail->SMTPSecure = 'ssl';
        $mail->IsSMTP();
        $mail->Host = "baresfuertoner.de"; // Your Domain Name
         
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = "info@baresfuertoner.de"; // Your Email ID
        $mail->Password = "Rain=snow123"; // Password of your email id
         
        
        $mail->From = "info@baresfuertoner.de";
        $mail->FromName = "$name";
        $mail->AddAddress ("info@baresfuertoner.de"); // On which email id you want to get the message
		// mail copy to any address
        //$mail->AddCC ($email);
		
		 // multiple file attachments
		 //<input type="file" multiple="multiple" name="attach_file[]" accept="image/*" />
		 for($ct=0;$ct<count($_FILES['attach_file']['tmp_name']);$ct++){
         $mail->AddAttachment($_FILES['attach_file']['tmp_name'][$ct],$_FILES['attach_file']['name'][$ct]);
        }
		 /***************************/
        
		 
		 
        $mail->IsHTML(true);
         
        $mail->Subject = "[Form Response] by $fname"; // This is your subject
         
        // HTML Message Starts here
         
        $mail->Body = "
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$fname</td>
                        </tr>
						
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Phone: </strong></td>
                            <td style='width:400px'>$phone</td>
                        </tr>
						<tr>
                            <td style='width:150px'><strong>Subject: </strong></td>
                            <td style='width:400px'>$subject</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$message</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here
         
                if ( isInjected($fname) || isInjected($email)  || isInjected($subject) || isInjected($phone) || isInjected($message)) {
   header( "Location: $homePage" );
   echo "Mail not sent error";
   }
        elseif(!$mail->Send()) {
            // Message if mail has been sent
            echo "mail not sent error";
        }
        else {
            // Message if mail has been not sent
            echo "mail sent successfully.";
        }
 
   }
?>