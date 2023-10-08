<title>Send verification code | </title>
<?php include 'topbar.php'; ?>

<body class="hold-transition login-page">
  <div class="login-box" style="margin-top: 500px;">
    <div class="card card-outline card-primary">
<?php 
    if(isset($_POST['search'])) {
      $email = $_POST['email'];
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      if(mysqli_num_rows($fetch) > 0) {
      $row = mysqli_fetch_array($fetch);
?>
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Reset password</b></a>
    </div>
    <div class="card-body">
      <h5 class="login-box-msg">Send code through your email?</h5>
      <form action="verifycode.php" method="POST">
        <div class="row">
          <div class="col-md-12">
            <div class="input-group mb-3">
              <img src="images-users/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%; display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
            </div>
            <p class="text-center mb-4"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></p>
          </div>
          <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
          <div class="col-md-12">
            <div class="input-group">
              <p>Send code via email?</p>
            </div>
          </div>
           <div class="col-md-12" style="margin-top: -18px;">
            <div class="input-group">
              <p><b><?php echo $row['email']; ?></b></p>
            </div>
          </div>
        </div>
      <div class="social-auth-links text-center mt-4">
        <button class="btn btn-block btn-primary" type="submit" name="sendcode">Continue</button>
        <p class="mt-1"><a href="forgotpassword.php" class="text-center">Not you?</a></p>  
      </div>
      </form>
    </div>

<?php } else { 

    $fetch2 = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
    if(mysqli_num_rows($fetch2) > 0) {
    $row2 = mysqli_fetch_array($fetch2);
?>
    
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Reset password</b></a>
    </div>
    <div class="card-body">
      <h5 class="login-box-msg">Send code through your email?</h5>
      <form action="admin_verifycode.php" method="POST">
        <div class="row">
          <div class="col-md-12">
            <div class="input-group mb-3">
              <img src="images-admin/<?php echo $row2['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%; display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
            </div>
            <p class="text-center mb-4"><?php echo ' '.$row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'].' '.$row2['suffix'].' '; ?></p>
          </div>
          <input type="hidden" name="email" value="<?php echo $row2['email']; ?>">
          <div class="col-md-12">
            <div class="input-group">
              <p>Send code via email?</p>
            </div>
          </div>
           <div class="col-md-12" style="margin-top: -18px;">
            <div class="input-group">
              <p><b><?php echo $row2['email']; ?></b></p>
            </div>
          </div>
        </div>
      <div class="social-auth-links text-center mt-4">
        <button class="btn btn-block btn-primary" type="submit" name="sendcode">Continue</button>
        <p class="mt-1"><a href="forgotpassword.php" class="text-center">Not you?</a></p>  
      </div>
      </form>
    </div>

<?php } else { ?>

    <div class="card-header text-center">
      <a href="#" class="h1"><b>404 Not Found</b></a>
    </div>
    <div class="card-body">
      <h5 class="login-box-msg">Sorry, this account does not exist.</h5>
          <div class="col-md-12">
            <div class="input-group mb-3">
              <img src="images/hack-khaby.gif" alt="" style="width: 100px;  display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
            </div>
          </div>
      <div class="social-auth-links text-center mt-4">
        <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
      </div>
    </div>
    
<?php } } } else { ?>

    <div class="card-header text-center">
      <a href="#" class="h1"><b>404 Not Found</b></a>
    </div>
    <div class="card-body">
      <h5 class="login-box-msg">Sorry, this account does not exist.</h5>
        <div class="col-md-12">
          <div class="input-group mb-3">
            <img src="images/hack-khaby.gif" alt="" style="width: 100px;  display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
          </div>
        </div>
      <div class="social-auth-links text-center mt-4">
        <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
      </div>
    </div>

<?php } ?>

  </div>
</div>

<?php include 'footer.php'; ?>

