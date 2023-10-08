<?php 
include 'topbar.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';
?>

<body class="hold-transition login-page">
  <div class="login-box" style="margin-top: 500px;">
    <div class="card card-outline card-primary">
<?php 
if(isset($_POST['sendcode'])) {

  $email = $_POST['email'];
  $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if(mysqli_num_rows($fetch) > 0) {

    $row  = mysqli_fetch_array($fetch);
    $user_Id = $row['user_Id'];
    $key  = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

      $check_code = mysqli_query($conn, "SELECT verification_code FROM users WHERE user_Id='$user_Id'");
      if($check_code == NULL) {

        $insert_code = mysqli_query($conn, "UPDATE users SET verification_code='$key' WHERE user_Id='$user_Id'");
        if($insert_code) {

          $get_code = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
          $row2 = mysqli_fetch_array($get_code);
          $code = $row2['verification_code'];

          $subject = 'Verification code';
          $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$code.'</b>. Please do not share this code to other people. Thank you!</p>
          <p>You can change your password by just clicking it <a href="http://localhost/PROJECT%208.%20POSTING%20SITE/changepassword2.php?user_Id='.$user_Id.'&&email='.$email.'&&key='.$code.'">here!</a></p> 
          <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

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
            $mail->addAddress($email);              
            $mail->addReplyTo('nhsmedellin@gmail.com');

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
?>

        <div class="card-header text-center">
          <a href="#" class="h3"><b>Enter security code</b></a>                           
        </div>
        <div class="card-body">
          <p class="login-box-msg">Please check your email for a message with your code. Your code is 6 numbers long.</p>
          <form action="changepassword.php" method="POST">
            <div class="row">
              <div class="col-md-12">
                <div class="input-group mb-3">
                  <input type="hidden" class="form-control" value="<?php echo $user_Id; ?>" name="user_Id">
                  <input type="hidden" class="form-control" value="<?php echo $email; ?>" name="email">
                  <input type="text" class="form-control" placeholder="Enter code" name="code">
                  <div class="input-group-append">
                  <div class="input-group-text">
                   <i class="fa-solid fa-key"></i>
                  </div>
                </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-group">
                  <p>We sent your code to: <b><?php echo $email; ?></b></p>
                </div>  
              </div>
            </div>
            <div class="social-auth-links text-center">
            <button class="btn btn-block btn-primary" type="submit" name="verify_code">Continue</button>
            <a href="sendcode2.php?email=<?php echo $email; ?>" class="mt-1">Didn't get a code?</a>
            <hr>
            <p class="mt-1"><a href="login.php" class="text-center">Back to login page</a></p>  
            </div>
          </form>
        </div>

<?php } catch (Exception $e) { ?>

        <div class="card-header text-center">
          <a href="#" class="h1"><b>Email not sent.</b></a>
        </div>
        <div class="card-body">
          <h5 class="login-box-msg">Sorry, something went wrong while sending an email to <b><?php echo $email; ?></b>.</h5>
          <div class="social-auth-links text-center mt-4">
            <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
          </div>
        </div>

<?php } } // CLOSING TAG - IF INSERT CODE IS TRUE
else { ?>

        <div class="card-header text-center">
          <a href="#" class="h1"><b>500 ERROR</b></a>
        </div>
        <div class="card-body">
           <h5 class="login-box-msg">Sorry, unexpected error. Please try again later.</h5>
          <div class="social-auth-links text-center mt-4">
            <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
          </div>
        </div>

<?php } } // CLOSING TAG IF CODE IS NULL
  else {  // ELSE STATEMENT IF VERIFICATION CODE IS NOT NULL

    $update_code = mysqli_query($conn, "UPDATE users SET verification_code='$key' WHERE user_Id='$user_Id'");
    if($update_code) {

      $get_code = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
      $row2 = mysqli_fetch_array($get_code);
      $code = $row2['verification_code'];

      $subject = 'Verification code';
      $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$code.'</b>. Please do not share this code to other people. Thank you!</p>
      <p>You can change your password by just clicking it <a href="http://localhost/PROJECT%208.%20POSTING%20SITE/changepassword2.php?user_Id='.$user_Id.'&&email='.$email.'&&key='.$code.'">here!</a></p> 
      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';


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
        $mail->addAddress($email);              
        $mail->addReplyTo('nhsmedellin@gmail.com');

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
?>

        <div class="card-header text-center">
          <a href="#" class="h3"><b>Enter security code</b></a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Please check your email for a message with your code. Your code is 6 numbers long.</p>
          <form action="changepassword.php" method="POST">
            <div class="row">
              <div class="col-md-12">
                <div class="input-group mb-3">
                  <input type="hidden" class="form-control" value="<?php echo $user_Id; ?>" name="user_Id">
                  <input type="hidden" class="form-control" value="<?php echo $email; ?>" name="email">
                  <input type="text" class="form-control" placeholder="Enter code" name="code">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="fa-solid fa-key"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-group">
                  <p>We sent your code to: <b><?php echo $email; ?></b></p>
                </div>
              </div>
            </div>
            <div class="social-auth-links text-center">
              <button class="btn btn-block btn-primary" type="submit" name="verify_code">Continue</button>
              <a href="sendcode2.php?email=<?php echo $email; ?>" class="mt-1">Didn't get a code?</a>
              <hr>
              <p class="mt-1"><a href="login.php" class="text-center">Back to login page</a></p>  
            </div>
          </form>
        </div>

<?php } catch (Exception $e) { ?>

        <div class="card-header text-center">
          <a href="#" class="h1"><b>Email not sent.</b></a>
        </div>
        <div class="card-body">
          <h5 class="login-box-msg">Sorry, something went wrong while sending an email to <b><?php echo $email; ?></b>.</h5>
          <div class="social-auth-links text-center mt-4">
            <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
          </div>
        </div>

<?php } } // CLOSING TAG - IF UPDATE CODE IS TRUE
  else { ?>

        <div class="card-header text-center">
          <a href="#" class="h1"><b>500 ERROR</b></a>
        </div>
        <div class="card-body">
          <h5 class="login-box-msg">Sorry, unexpected error. Please try again later.</h5>
          <div class="social-auth-links text-center mt-4">
            <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
          </div>
        </div>

<?php } } // CLOSING IF ELSE STATEMENT IF VERIFICATION CODE IS NOT NULL
    } // CLOSING IF STATEMENT IF EMAIL IS GREATER THAN 0 (2nd if statement)
  else { ?>  

        <div class="card-header text-center">
          <a href="#" class="h1"><b>404 Not Found</b></a>
        </div>
        <div class="card-body">
          <h5 class="login-box-msg">Sorry, your email <b><?php echo $email; ?></b>, does not exist in our database.</h5>
          <div class="social-auth-links text-center mt-4">
            <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
          </div>
        </div>

<?php } } // CLOSING FIRST IF STATEMENT
  else { ?>

        <div class="card-header text-center">
          <a href="#" class="h1"><b>500 ERROR</b></a>
        </div>
        <div class="card-body">
          <h5 class="login-box-msg">Sorry, unexpected error. Please try again later.</h5>
          <div class="social-auth-links text-center mt-4">
            <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
          </div>
        </div>

<?php } ?>

  </div>
</div>

<?php include 'footer.php'; ?>

