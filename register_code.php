<?php 


	session_start();
	include 'config.php';

	// SAVE USER
	if(isset($_POST['create_user'])) {

		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);
		$IdfileToUpload  = basename($_FILES["IdfileToUpload"]["name"]);

		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
						$_SESSION['exists']  = "Email is already taken.";
            header("Location: register.php");
		} else {

			if($password != $cpassword) {
				$_SESSION['exists']  = "Password does not matched.";
            	header("Location: register.php");
			} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                  header("Location: register.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['error']  = "Your file was not uploaded.";
                  header("Location: register.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	// Check if image file is a actual image or fake image
							          $idtarget_dir = "images-id/";
							          $idtarget_file = $idtarget_dir . basename($_FILES["IdfileToUpload"]["name"]);
							          $id_uploadOk = 1;
							          $id_imageFileType = strtolower(pathinfo($idtarget_file,PATHINFO_EXTENSION));

					              // Allow certain file formats
					              if($id_imageFileType != "jpg" && $id_imageFileType != "png" && $id_imageFileType != "jpeg" && $id_imageFileType != "gif" ) {
					              $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
					              header("Location: register.php");
					              $id_uploadOk = 0;
					              }

					              // Check if $uploadOk is set to 0 by an error
					              if ($id_uploadOk == 0) {
					              $_SESSION['error']  = "Your file was not uploaded.";
					              header("Location: register.php");
					              // if everything is ok, try to upload file
					              } else {

					                  if (move_uploaded_file($_FILES["IdfileToUpload"]["tmp_name"], $idtarget_file)) {
					                 	
					                  	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, image_Id, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file', '$IdfileToUpload', '$date_registered')");

					                        if($save) {
					                          $_SESSION['success']  = "User information has been successfully saved!";
					                          header("Location: register.php");                                
					                        } else {
					                          $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
					                          header("Location: register.php");
					                        }
					                  } else {
					                        $_SESSION['exists'] = "There was an error uploading your ID picture file.";
					                        header("Location: register.php");
					                  }
							 					}




                      } else {
                            $_SESSION['exists'] = "There was an error uploading your profile picture file.";
                            header("Location: register.php");
                      }
				 }

			}

		}

	}


?>