<?php 
	session_start();
	include '../config.php';

	// UPDATE USER
	if(isset($_POST['update_user'])) {

		$user_id    = $_POST['user_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE user_Id='$user_id'");
		            if($save) {
			                $_SESSION['success']  = "User information has been updated!";
			                header("Location: users.php");                                
		            } else {
			                $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
			                header("Location: users.php");
		            }

		} else {

				  // Check if image file is a actual image or fake image
		          $target_dir = "../images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                  header("Location: users.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['error']  = "Your file was not uploaded.";
                  header("Location: users.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file' WHERE user_Id='$user_id'");
				            if($save) {
					                $_SESSION['success']  = "User information has been updated!";
					                header("Location: users.php");                                
				            } else {
					                $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
					                header("Location: users.php");
				            }
                      } else {
                            $_SESSION['exists'] = "There was an error uploading your file.";
                            header("Location: users.php");
                      }

				 }

		}

		
	}






	// UPDATE USER ID
	if(isset($_POST['updateID'])) {

		$user_id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		// Check if image file is a actual image or fake image
		          $target_dir = "../images-id/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                  header("Location: users.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['error']  = "Your file was not uploaded.";
                  header("Location: users.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE users SET image_Id='$file' WHERE user_Id='$user_id'");
				            if($save) {
					                $_SESSION['success']  = "ID picture has been updated!";
					                header("Location: users.php");                                
				            } else {
					                $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
					                header("Location: users.php");
				            }
                      } else {
                            $_SESSION['exists'] = "There was an error uploading your file.";
                            header("Location: users.php");
                      }

				 }

		
	}





	// CHANGE USER PASSWORD
	if(isset($_POST['password_user'])) {

    	$user_Id     = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				$_SESSION['exists']  = "Password does not matched. Please try again";
		          			header("Location: users.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");

			    			if($update_password) {
			    					$_SESSION['success']  = "Password has been changed.";
		          					header("Location: users.php");
			    			} else {
			    					$_SESSION['exists']  = "Something went wrong while changing the password.";
			          				header("Location: users.php");
			    			}
		    		}
    	} else {
    		$_SESSION['exists']  = "Old password is incorrect.";
            header("Location: users.php");
    	}

    }











    // UPDATE ADMIN
	if(isset($_POST['update_admin'])) {

		$admin_Id    = $_POST['admin_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE admin_Id='$admin_Id'");
		            if($save) {
			                $_SESSION['success']  = "Admin information has been updated!";
			                header("Location: admin.php");                                
		            } else {
			                $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
			                header("Location: admin.php");
		            }

		} else {

				  // Check if image file is a actual image or fake image
		          $target_dir = "../images-admin/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                  header("Location: admin.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['error']  = "Your file was not uploaded.";
                  header("Location: admin.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file' WHERE admin_Id='$admin_Id'");
				            if($save) {
					                $_SESSION['success']  = "Admin information has been updated!";
					                header("Location: admin.php");                                
				            } else {
					                $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
					                header("Location: admin.php");
				            }
                      } else {
                            $_SESSION['exists'] = "There was an error uploading your file.";
                            header("Location: admin.php");
                      }

				 }

		}
	}




	// CHANGE ADMIN PASSWORD
	if(isset($_POST['password_admin'])) {

    	$admin_Id    = $_POST['admin_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM admin WHERE password='$OldPassword' AND admin_Id='$admin_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				$_SESSION['exists']  = "Password does not matched. Please try again";
		          			header("Location: admin.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE admin SET password='$password' WHERE admin_Id='$admin_Id' ");

			    			if($update_password) {
			    					$_SESSION['success']  = "Password has been changed.";
		          					header("Location: admin.php");
			    			} else {
			    					$_SESSION['exists']  = "Something went wrong while changing the password.";
			          				header("Location: admin.php");
			    			}
		    		}
    	} else {
    		$_SESSION['exists']  = "Old password is incorrect.";
            header("Location: admin.php");
    	}

    }






// UPDATE MISSING

		if(isset($_POST['update_missing'])) {

			$post_Id							   = $_POST['post_Id'];
			$city_from               = $_POST['city_from'];
			$name                    = $_POST['name'];
			$Disappearance           = $_POST['Disappearance'];
			$gender                  = $_POST['gender'];
			$dob                     = $_POST['dob'];
			$Pronouns                = $_POST['Pronouns'];
			$Race                    = $_POST['Race'];
			$Height                  = $_POST['Height'];
			$Height                  = str_replace("'", "\'", $Height);
			$Weight                  = $_POST['Weight'];
			$Hair                    = $_POST['Hair'];
			$Headhair                = $_POST['Headhair'];
			$dye                     = $_POST['dye'];
			$eye                     = $_POST['eye'];
			$teeth                   = $_POST['teeth'];  //ARRAY
			$scars                   = $_POST['scars'];
			$Piercings               = $_POST['Piercings'];
			$Tattoos                 = $_POST['Tattoos'];
			$Clothing                = $_POST['Clothing'];
			$Footwear                = $_POST['Footwear'];
			$Shoe                    = $_POST['Shoe'];
			$Coat                    = $_POST['Coat'];
			$Head                    = $_POST['Head'];
			$Jewelry                 = $_POST['Jewelry'];
			$Eyewear                 = $_POST['Eyewear'];
			$Illnesses               = $_POST['Illnesses'];
			$Medication              = $_POST['Medication'];
			$History                 = $_POST['History'];
			$Hobbies                 = $_POST['Hobbies'];
			$gadget                  = $_POST['gadget']; //ARRAY
			$Cell                    = $_POST['Cell'];
			$PersonEmail             = $_POST['PersonEmail'];
			$Lastlocation            = $_POST['Lastlocation'];
			$personwith              = $_POST['personwith'];
			$Personaddress           = $_POST['Personaddress'];
			$Phonelastperson         = $_POST['Phonelastperson'];
			$workschool              = $_POST['workschool'];
			$Schooladdress           = $_POST['Schooladdress'];
			$Schoolcontact           = $_POST['Schoolcontact'];
			$datefiled               = $_POST['datefiled'];
			$Time                    = $_POST['Time'];
			$repeatmissing           = $_POST['repeatmissing'];
			$lawagency               = $_POST['lawagency'];
			$Assigned                = $_POST['Assigned'];
			$Enforcement             = $_POST['Enforcement'];
			$Case                    = $_POST['Case'];
			$reward                  = $_POST['reward'];
			$Family_Guardian         = $_POST['Family_Guardian'];
			$Relationship            = $_POST['Relationship'];
			$Authorized_Email  	   	 = $_POST['Authorized_Email'];
			$Authorized_fb           = $_POST['Authorized_fb'];
			$Comments   					   = $_POST['Comments'];
			$Completing              = $_POST['Completing'];
			$Relationship_to_Missing = $_POST['Relationship_to_Missing'];
			$Contact_completingform  = $_POST['Contact_completingform'];
			// $file                    = basename($_FILES["fileToUpload"]["name"]);
      $image = $_FILES['image'];


			$all_teeth=""; 

  	  foreach($teeth as $teeths)  
      {  
         $all_teeth .= $teeths.",";  
      } 

      $all_gadget=""; 

  	  foreach($gadget as $gadgets)  
      {  
         $all_gadget .= $gadgets.",";  
      } 


      if(empty($image)) {

      		$update = mysqli_query($conn, "UPDATE posted SET city_from='$city_from', name = '$name', disappearance_date = '$Disappearance', gender = '$gender', dob = '$dob', pronouns = '$Pronouns', race = '$Race', height = '$Height', weight = '$Weight', hair_color = '$Hair', head_color = '$Headhair', dye_color = '$dye', eye = '$eye', teeth = '$all_teeth', scars = '$scars', piercings = '$Piercings', tattoos = '$Tattoos', clothing = '$Clothing', footwear = '$Footwear', shoe_size = '$Shoe', coat = '$Coat', 	head_wear = '$Head', jewelry = '$Jewelry', eyewear = '$Eyewear', illnesses = '$Illnesses', medication = '$Medication', drugs_alcohol = '$History', hobbies = '$Hobbies', gadgets = '$all_gadget', contact = '$Cell', email = '$PersonEmail', last_location = '$Lastlocation', last_person_with = '$personwith', last_person_with_address = '$Personaddress', last_person_with_contact = '$Phonelastperson', work_school_name = '$workschool', work_school_address = '$Schooladdress', 	work_school_contact = '$Schoolcontact', date_report_filed = '$datefiled', time_missing = '$Time', repeat_missing = '$repeatmissing', agency_enforcement = '$lawagency',	officer = '$Assigned', agency_phone = '$Enforcement', emergency_number = '$Case', reward = '$reward', family_contact = '$Family_Guardian', relationship_to_missing = '$Relationship', family_email = '$Authorized_Email', family_fb = '$Authorized_fb', comments = '$Comments', name_who_fill_up = '$Completing', name_who_fill_up_relationship = '$Relationship_to_Missing', name_who_fill_up_contact = '$Contact_completingform' WHERE post_Id='$post_Id'");

      		if($update) {
	           $_SESSION['success']  = "Missing person's information has been updated!";
	           header("Location: posted_update.php?post_Id=$post_Id");
	        } else {
	         	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	           header("Location: posted_update.php?post_Id=$post_Id");     
	        }


      } else {

							$file_name = $_FILES["image"]["name"];
      				$location  = "../images-missing/";
      				$image_name = implode(",",$file_name);

      				if(!empty($file_name)) {

      						foreach ($file_name as $key => $val) {
      								$targetPath = $location .$val;

      								move_uploaded_file($_FILES["image"]["tmp_name"][$key],$targetPath);
      						}
      				}


      				$update = mysqli_query($conn, "UPDATE posted SET city_from='$city_from', name = '$name', disappearance_date = '$Disappearance', gender = '$gender', dob = '$dob', pronouns = '$Pronouns', race = '$Race', height = '$Height', weight = '$Weight', hair_color = '$Hair', head_color = '$Headhair', dye_color = '$dye', eye = '$eye', teeth = '$all_teeth', scars = '$scars', piercings = '$Piercings', tattoos = '$Tattoos', clothing = '$Clothing', footwear = '$Footwear', shoe_size = '$Shoe', coat = '$Coat', 	head_wear = '$Head', jewelry = '$Jewelry', eyewear = '$Eyewear', illnesses = '$Illnesses', medication = '$Medication', drugs_alcohol = '$History', hobbies = '$Hobbies', gadgets = '$all_gadget', contact = '$Cell', email = '$PersonEmail', last_location = '$Lastlocation', last_person_with = '$personwith', last_person_with_address = '$Personaddress', last_person_with_contact = '$Phonelastperson', work_school_name = '$workschool', work_school_address = '$Schooladdress', 	work_school_contact = '$Schoolcontact', date_report_filed = '$datefiled', time_missing = '$Time', repeat_missing = '$repeatmissing', agency_enforcement = '$lawagency',	officer = '$Assigned', agency_phone = '$Enforcement', emergency_number = '$Case', reward = '$reward', family_contact = '$Family_Guardian', relationship_to_missing = '$Relationship', family_email = '$Authorized_Email', family_fb = '$Authorized_fb', comments = '$Comments', name_who_fill_up = '$Completing', name_who_fill_up_relationship = '$Relationship_to_Missing', name_who_fill_up_contact = '$Contact_completingform', posted_image = '$image_name' WHERE post_Id='$post_Id'");

                            if($update) {
	                             $_SESSION['success']  = "Missing person's information has been updated!";
	                             header("Location: posted_update.php?post_Id=$post_Id");
                            } else {
                             	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                             header("Location: posted_update.php?post_Id=$post_Id");    
                            }

      }

			 			 

		}


?>