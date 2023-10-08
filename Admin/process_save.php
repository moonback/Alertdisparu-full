<?php 
	session_start();
	include '../config.php';

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
            header("Location: users.php");
		} else {

			if($password != $cpassword) {
				$_SESSION['exists']  = "Password does not matched.";
            	header("Location: users.php");
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

                      	// Check if image file is a actual image or fake image
							          $idtarget_dir = "../images-id/";
							          $idtarget_file = $idtarget_dir . basename($_FILES["IdfileToUpload"]["name"]);
							          $id_uploadOk = 1;
							          $id_imageFileType = strtolower(pathinfo($idtarget_file,PATHINFO_EXTENSION));

					              // Allow certain file formats
					              if($id_imageFileType != "jpg" && $id_imageFileType != "png" && $id_imageFileType != "jpeg" && $id_imageFileType != "gif" ) {
					              $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
					              header("Location: users.php");
					              $id_uploadOk = 0;
					              }

					              // Check if $uploadOk is set to 0 by an error
					              if ($id_uploadOk == 0) {
					              $_SESSION['error']  = "Your file was not uploaded.";
					              header("Location: users.php");
					              // if everything is ok, try to upload file
					              } else {

					                  if (move_uploaded_file($_FILES["IdfileToUpload"]["tmp_name"], $idtarget_file)) {
					                 	
					                  	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, image_Id, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file', '$IdfileToUpload', '$date_registered')");

	                            if($save) {
		                            $_SESSION['success']  = "User information has been successfully saved!";
		                            header("Location: users.php");                                
	                            } else {
	                              $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                              header("Location: users.php");
	                            }
					                  } else {
					                        $_SESSION['exists'] = "There was an error uploading your ID picture file.";
					                        header("Location: users.php");
					                  }
							 					}
                     	
                      	
                      } else {
                            $_SESSION['exists'] = "There was an error uploading your profile picture file.";
                            header("Location: users.php");
                      }
				 }

			}

		}

	}








	// SAVE ADMIN
	if(isset($_POST['create_admin'])) {

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


		$check_email = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
			$_SESSION['exists']  = "Email is already taken.";
            header("Location: admin.php");
		} else {

			if($password != $cpassword) {
				$_SESSION['exists']  = "Password does not matched.";
            	header("Location: admin.php");
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
                     	
                      	$save = mysqli_query($conn, "INSERT INTO admin (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {
	                            $_SESSION['success']  = "Admin information has been successfully saved!";
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

	}








	if(isset($_POST['save'])) {

			$admin_Id							   = $_POST['admin_Id'];
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


       $fetch = mysqli_query($conn, "SELECT * FROM posted WHERE name='$name' AND dob='$dob' AND city_from='$city_from' AND gender='$gender'");
      if(mysqli_num_rows($fetch) > 0 ) {

      		$_SESSION['exists']  = "This person has already been posted by anyone else.";
	        header("Location: posted_add.php");  

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


      				if($all_gadget == '' AND $all_teeth == '') {


                      			$save = mysqli_query($conn, "INSERT INTO posted (admin_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, height, weight, hair_color, head_color, dye_color, eye, scars, piercings, tattoos, clothing, footwear, shoe_size, coat, 	head_wear, jewelry, eyewear, illnesses, medication, drugs_alcohol, hobbies, contact, email, last_location, last_person_with, last_person_with_address, last_person_with_contact, work_school_name, work_school_address, 	work_school_contact, date_report_filed, time_missing, repeat_missing, agency_enforcement,	officer, agency_phone, emergency_number, reward, family_contact, relationship_to_missing, family_email, family_fb, comments, name_who_fill_up, name_who_fill_up_relationship, name_who_fill_up_contact, posted_image) VALUES ('$admin_Id', '$city_from', '$name', '$Disappearance', '$gender', '$dob', '$Pronouns', '$Race', '$Height', '$Weight', '$Hair', '$Head', '$dye', '$eye', '$scars', '$Piercings', '$Tattoos', '$Clothing', '$Footwear', '$Shoe', '$Coat', '$Head', '$Jewelry', '$Eyewear', '$Illnesses', '$Medication', '$History', '$Hobbies', '$Cell', '$PersonEmail', '$Lastlocation', '$personwith', '$Personaddress', '$Phonelastperson', '$workschool', '$Schooladdress', '$Schoolcontact', '$datefiled', '$Time', '$repeatmissing', '$lawagency', '$Assigned', '$Enforcement', '$Case', '$reward', '$Family_Guardian', '$Relationship', '$Authorized_Email', '$Authorized_fb', '$Comments', '$Completing', '$Relationship_to_Missing', '$Contact_completingform', '$image_name')");

                            if($save) {
	                             $_SESSION['success']  = "Missing person's information has been posted!";
	                             header("Location: posted.php");
                            } else {
                             	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                             header("Location: posted_add.php");      
                            }


                      	} elseif($all_gadget == '' AND $all_teeth != '') {

                      			$save = mysqli_query($conn, "INSERT INTO posted (admin_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, height, weight, hair_color, head_color, dye_color, eye, teeth, scars, piercings, tattoos, clothing, footwear, shoe_size, coat, 	head_wear, jewelry, eyewear, illnesses, medication, drugs_alcohol, hobbies,contact, email, last_location, last_person_with, last_person_with_address, last_person_with_contact, work_school_name, work_school_address, 	work_school_contact, date_report_filed, time_missing, repeat_missing, agency_enforcement,	officer, agency_phone, emergency_number, reward, family_contact, relationship_to_missing, family_email, family_fb, comments, name_who_fill_up, name_who_fill_up_relationship, name_who_fill_up_contact, posted_image) VALUES ('$admin_Id', '$city_from', '$name', '$Disappearance', '$gender', '$dob', '$Pronouns', '$Race', '$Height', '$Weight', '$Hair', '$Head', '$dye', '$eye', '$all_teeth', '$scars', '$Piercings', '$Tattoos', '$Clothing', '$Footwear', '$Shoe', '$Coat', '$Head', '$Jewelry', '$Eyewear', '$Illnesses', '$Medication', '$History', '$Hobbies', '$Cell', '$PersonEmail', '$Lastlocation', '$personwith', '$Personaddress', '$Phonelastperson', '$workschool', '$Schooladdress', '$Schoolcontact', '$datefiled', '$Time', '$repeatmissing', '$lawagency', '$Assigned', '$Enforcement', '$Case', '$reward', '$Family_Guardian', '$Relationship', '$Authorized_Email', '$Authorized_fb', '$Comments', '$Completing', '$Relationship_to_Missing', '$Contact_completingform', '$image_name')");

                            if($save) {
	                             $_SESSION['success']  = "Missing person's information has been posted!";
	                             header("Location: posted.php");
                            } else {
                             	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                             header("Location: posted_add.php");      
                            }

                      	} elseif($all_gadget != '' AND $all_teeth == '') {


                      				$save = mysqli_query($conn, "INSERT INTO posted (admin_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, height, weight, hair_color, head_color, dye_color, eye, scars, piercings, tattoos, clothing, footwear, shoe_size, coat, 	head_wear, jewelry, eyewear, illnesses, medication, drugs_alcohol, hobbies, gadgets, contact, email, last_location, last_person_with, last_person_with_address, last_person_with_contact, work_school_name, work_school_address, 	work_school_contact, date_report_filed, time_missing, repeat_missing, agency_enforcement,	officer, agency_phone, emergency_number, reward, family_contact, relationship_to_missing, family_email, family_fb, comments, name_who_fill_up, name_who_fill_up_relationship, name_who_fill_up_contact, posted_image) VALUES ('$admin_Id', '$city_from', '$name', '$Disappearance', '$gender', '$dob', '$Pronouns', '$Race', '$Height', '$Weight', '$Hair', '$Head', '$dye', '$eye', '$scars', '$Piercings', '$Tattoos', '$Clothing', '$Footwear', '$Shoe', '$Coat', '$Head', '$Jewelry', '$Eyewear', '$Illnesses', '$Medication', '$History', '$Hobbies', '$all_gadget', '$Cell', '$PersonEmail', '$Lastlocation', '$personwith', '$Personaddress', '$Phonelastperson', '$workschool', '$Schooladdress', '$Schoolcontact', '$datefiled', '$Time', '$repeatmissing', '$lawagency', '$Assigned', '$Enforcement', '$Case', '$reward', '$Family_Guardian', '$Relationship', '$Authorized_Email', '$Authorized_fb', '$Comments', '$Completing', '$Relationship_to_Missing', '$Contact_completingform', '$image_name')");

                            if($save) {
	                             $_SESSION['success']  = "Missing person's information has been posted!";
	                             header("Location: posted.php");
                            } else {
                             	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                             header("Location: posted_add.php");      
                            }

                      	} else {


                      			$save = mysqli_query($conn, "INSERT INTO posted (admin_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, height, weight, hair_color, head_color, dye_color, eye, teeth, scars, piercings, tattoos, clothing, footwear, shoe_size, coat, 	head_wear, jewelry, eyewear, illnesses, medication, drugs_alcohol, hobbies, gadgets, contact, email, last_location, last_person_with, last_person_with_address, last_person_with_contact, work_school_name, work_school_address, 	work_school_contact, date_report_filed, time_missing, repeat_missing, agency_enforcement,	officer, agency_phone, emergency_number, reward, family_contact, relationship_to_missing, family_email, family_fb, comments, name_who_fill_up, name_who_fill_up_relationship, name_who_fill_up_contact, posted_image) VALUES ('$admin_Id', '$city_from', '$name', '$Disappearance', '$gender', '$dob', '$Pronouns', '$Race', '$Height', '$Weight', '$Hair', '$Head', '$dye', '$eye', '$all_teeth', '$scars', '$Piercings', '$Tattoos', '$Clothing', '$Footwear', '$Shoe', '$Coat', '$Head', '$Jewelry', '$Eyewear', '$Illnesses', '$Medication', '$History', '$Hobbies', '$all_gadget', '$Cell', '$PersonEmail', '$Lastlocation', '$personwith', '$Personaddress', '$Phonelastperson', '$workschool', '$Schooladdress', '$Schoolcontact', '$datefiled', '$Time', '$repeatmissing', '$lawagency', '$Assigned', '$Enforcement', '$Case', '$reward', '$Family_Guardian', '$Relationship', '$Authorized_Email', '$Authorized_fb', '$Comments', '$Completing', '$Relationship_to_Missing', '$Contact_completingform', '$image_name')");

                            if($save) {
	                             $_SESSION['success']  = "Missing person's information has been posted!";
	                             header("Location: posted.php");
                            } else {
                             	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                             header("Location: posted_add.php");      
                            }


                      	}


      		


      }


		}

?>