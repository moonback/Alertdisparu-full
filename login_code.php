<?php 

	session_start();
	include 'config.php';

	// ADMIN / EMPLOYER LOGIN
	if(isset($_POST['login'])) {
		$email    = $_POST['email'];
		$password = md5($_POST['password']);

		$check = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password' AND user_type='1'");

		if(mysqli_num_rows($check)===1) {

			$row = mysqli_fetch_array($check);
			if($row['email'] === $email && $row['password'] === $password) {
				$_SESSION['admin_Id'] = $row['admin_Id'];
				header("Location: Admin/dashboard.php");
			} else {
				$_SESSION['message'] = "Password is incorrect.";
		        $_SESSION['text'] = "Please try again";
		        $_SESSION['status'] = "error";
		        header("Location: login.php");
			}
			
		} else {
				
				$check2 = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password' ");
                
                if(mysqli_num_rows($check2)===1) {

					$row = mysqli_fetch_array($check2);
					if($row['email'] === $email && $row['password'] === $password) {
						$_SESSION['user_Id'] = $row['user_Id'];
						header("Location: User/dashboard.php");
					} else {
						$_SESSION['message'] = "Password is incorrect.";
				        $_SESSION['text'] = "Please try again";
				        $_SESSION['status'] = "error";
				        header("Location: login.php");
					}
					
				} else {
						$_SESSION['message'] = "Password is incorrect.";
				        $_SESSION['text'] = "Please try again";
				        $_SESSION['status'] = "error";
				        header("Location: login.php");
		         }


         }
	}





use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

if(isset($_POST['sendemail'])) {

  	$email   = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];
    $message = '<h3>'.$subject.'</h3>
				<p>The person whose email <b>'.$email.'</b> says, '.$msg.'.</p>
				<p><b>Note:</b> This is a system generated email please do not reply.</p>';
				//Load composer's autoloader

		    $mail = new PHPMailer(true);                            
		    try {
		        //Server settings
		        $mail->isSMTP();                                     
		        $mail->Host = 'smtp.gmail.com';                      
		        $mail->SMTPAuth = true;                             
		        $mail->Username = 'nhsmedellin@gmail.com';     
        		$mail->Password = 'fgzyhjjhjxdikkjp';                
		        $mail->SMTPOptions = array(
		            'ssl' => array(
		            'verify_peer' => false,
		            'verify_peer_name' => false,
		            'allow_self_signed' => true
		            )
		        );                         
		        $mail->SMTPSecure = 'ssl';                           
		        $mail->Port = 465;                                   

		        //Send Email
		        $mail->setFrom('nhsmedellin@gmail.com');
		        
		        //Recipients
		        $mail->addAddress('sonerwin12@gmail.com');              
		        $mail->addReplyTo($email);
		        
		        //Content
		        $mail->isHTML(true);                                  
		        $mail->Subject = $subject;
		        $mail->Body    = $message;

		        $mail->send();
				$_SESSION['success_email'] = 'Email has been sent.';
				header('Location: index.php?#contact');

		    } catch (Exception $e) {
		    	echo 'failed';
		    	$_SESSION['success_email']  = "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
     			header('Location: index.php?#contact');
		    }
 }
	





if(isset($_POST['addComment'])) {

  	$posted_Id   = $_POST['posted_Id'];
    $comment     = $_POST['comment'];
    $date_registered = date('Y-m-d');		
    $save = mysqli_query($conn, "INSERT INTO comments (posted_Id, comment, date_added) VALUES ('$posted_Id', '$comment', '$date_registered')");
    $_SESSION['success_email'] = 'Your comment about this person has been added.';
	header('Location: view_posted.php?posted_Id='.$posted_Id.'');
 }
?>