<title>Change password | </title>
<?php include 'topbar.php'; ?>

<body class="hold-transition login-page">
  <div class="login-box" style="margin-top: 450px;">
    <div class="card card-outline card-primary">
<?php 
      if(isset($_POST['verify_code'])) {
      $user_Id = $_POST['user_Id'];
      $email   = $_POST['email'];
      $code    = $_POST['code'];
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND verification_code='$code' AND user_Id='$user_Id'");
      if(mysqli_num_rows($fetch) > 0) {
      $row = mysqli_fetch_array($fetch);
?>
      <div class="card-header text-center">
        <a href="#" class="h3"><b>Create new password</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Please create new password</p>
        <form action="login.php" method="POST">
          <input type="hidden" class="form-control" name="user_Id" value="<?php echo $user_Id; ?>">
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="New password" name="password" id="mynewpassword">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fa-solid fa-key"></i>
              </div>
            </div>
          </div>
          <div class="input-group">
            <input type="password" class="form-control" placeholder="Confirm new password" name="cpassword" id="cpassword" onkeyup="validate_password()">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fa-solid fa-key"></i>
              </div>
            </div>
          </div>
          <small id="wrong_pass_alert"></small>

          <div class="icheck-primary">
            <input type="checkbox" id="remember" onclick="myFunction()">
            <label for="remember">
              Show password
            </label>
          </div>

        <div class="social-auth-links text-center mt-4">
          <button class="btn btn-block btn-primary" type="submit" name="changepassword" id="changepassword">Change password</button>
          <p class="mt-1"><a href="login.php" class="text-center">Back to login</a></p>  
        </div>
        </form>
      </div>

<?php } else { ?>

      <div class="card-header text-center">
          <a href="#" class="h1"><b>500 ERROR</b></a>
      </div>
      <div class="card-body">
          <h5 class="login-box-msg">Sorry, unexpected error. Please try again later.</b>.</h5>
        <div class="social-auth-links text-center mt-4">
            <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
        </div>
      </div>

<?php } } else { ?>

      <div class="card-header text-center">
          <a href="#" class="h1"><b>500 ERROR</b></a>
      </div>
      <div class="card-body">
          <h5 class="login-box-msg">Sorry, unexpected error. Please try again later.</b>.</h5>
        <div class="social-auth-links text-center mt-4">
            <a class="btn btn-block btn-primary" href="forgotpassword.php">Back</a>
        </div>
      </div>

<?php } ?>

    </div>
  </div>

<?php include 'footer.php'; ?>

<script>
  // SHOW/HIDE PASSWORDS
  function myFunction() {
    var x = document.getElementById("mynewpassword");
    var y = document.getElementById("cpassword");
    if (x.type === "password" || y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
 }

// VALIDATE - MATCHED OR NOT MATCHED PASSWORDS
function validate_password() {
    var pass = document.getElementById('mynewpassword').value;
    var confirm_pass = document.getElementById('cpassword').value;
    if(pass == "") {
      confirm_pass.disabled = true;
    } else if (pass != confirm_pass) {
      document.getElementById('wrong_pass_alert').style.color = 'red';
      document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
      document.getElementById('changepassword').disabled = true;
      document.getElementById('changepassword').style.opacity = (0.4);
    } else {
      document.getElementById('wrong_pass_alert').style.color = 'green';
      document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
      document.getElementById('changepassword').disabled = false;
      document.getElementById('changepassword').style.opacity = (1);
    }
}
</script>
