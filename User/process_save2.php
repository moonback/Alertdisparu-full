<?php 

		session_start();
		include '../config.php';

		if(isset($_POST['save'])) {

			$user_Id							   = $_POST['user_Id'];
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
			$file                    = basename($_FILES["fileToUpload"]["name"]);

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


			 			  // Check if image file is a actual image or fake image
		          $target_dir = "../images-missing/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	                  $_SESSION['exists']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
	                  header("Location: posted_add.php");         
                  	$uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
	                  $_SESSION['exists']  = "Your file was not uploaded.";
	                  header("Location: posted_add.php");         
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


                      	if($all_gadget == '' AND $all_teeth == '') {


                      			$save = mysqli_query($conn, "INSERT INTO posted (user_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, height, weight, hair_color, head_color, dye_color, eye, scars, piercings, tattoos, clothing, footwear, shoe_size, coat, 	head_wear, jewelry, eyewear, illnesses, medication, drugs_alcohol, hobbies, contact, email, last_location, last_person_with, last_person_with_address, last_person_with_contact, work_school_name, work_school_address, 	work_school_contact, date_report_filed, time_missing, repeat_missing, agency_enforcement,	officer, agency_phone, emergency_number, reward, family_contact, relationship_to_missing, family_email, family_fb, comments, name_who_fill_up, name_who_fill_up_relationship, name_who_fill_up_contact, posted_image) VALUES ('$user_Id', '$city_from', '$name', '$Disappearance', '$gender', '$dob', '$Pronouns', '$Race', '$Height', '$Weight', '$Hair', '$Head', '$dye', '$eye', '$scars', '$Piercings', '$Tattoos', '$Clothing', '$Footwear', '$Shoe', '$Coat', '$Head', '$Jewelry', '$Eyewear', '$Illnesses', '$Medication', '$History', '$Hobbies', '$Cell', '$PersonEmail', '$Lastlocation', '$personwith', '$Personaddress', '$Phonelastperson', '$workschool', '$Schooladdress', '$Schoolcontact', '$datefiled', '$Time', '$repeatmissing', '$lawagency', '$Assigned', '$Enforcement', '$Case', '$reward', '$Family_Guardian', '$Relationship', '$Authorized_Email', '$Authorized_fb', '$Comments', '$Completing', '$Relationship_to_Missing', '$Contact_completingform', '$file')");

                            if($save) {
	                             $_SESSION['success']  = "Missing person's information has been posted!";
	                             header("Location: posted.php");
                            } else {
                             	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                             header("Location: posted_add.php");      
                            }


                      	} elseif($all_gadget == '' AND $all_teeth != '') {

                      			$save = mysqli_query($conn, "INSERT INTO posted (user_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, height, weight, hair_color, head_color, dye_color, eye, teeth, scars, piercings, tattoos, clothing, footwear, shoe_size, coat, 	head_wear, jewelry, eyewear, illnesses, medication, drugs_alcohol, hobbies, contact, email, last_location, last_person_with, last_person_with_address, last_person_with_contact, work_school_name, work_school_address, 	work_school_contact, date_report_filed, time_missing, repeat_missing, agency_enforcement,	officer, agency_phone, emergency_number, reward, family_contact, relationship_to_missing, family_email, family_fb, comments, name_who_fill_up, name_who_fill_up_relationship, name_who_fill_up_contact, posted_image) VALUES ('$user_Id', '$city_from', '$name', '$Disappearance', '$gender', '$dob', '$Pronouns', '$Race', '$Height', '$Weight', '$Hair', '$Head', '$dye', '$eye', '$all_teeth', '$scars', '$Piercings', '$Tattoos', '$Clothing', '$Footwear', '$Shoe', '$Coat', '$Head', '$Jewelry', '$Eyewear', '$Illnesses', '$Medication', '$History', '$Hobbies', '$Cell', '$PersonEmail', '$Lastlocation', '$personwith', '$Personaddress', '$Phonelastperson', '$workschool', '$Schooladdress', '$Schoolcontact', '$datefiled', '$Time', '$repeatmissing', '$lawagency', '$Assigned', '$Enforcement', '$Case', '$reward', '$Family_Guardian', '$Relationship', '$Authorized_Email', '$Authorized_fb', '$Comments', '$Completing', '$Relationship_to_Missing', '$Contact_completingform', '$file')");

                            if($save) {
	                             $_SESSION['success']  = "Missing person's information has been posted!";
	                             header("Location: posted.php");
                            } else {
                             	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                             header("Location: posted_add.php");      
                            }

                      	}elseif($all_gadget != '' AND $all_teeth == '') {


                      			$save = mysqli_query($conn, "INSERT INTO posted (user_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, height, weight, hair_color, head_color, dye_color, eye, scars, piercings, tattoos, clothing, footwear, shoe_size, coat, 	head_wear, jewelry, eyewear, illnesses, medication, drugs_alcohol, hobbies, gadgets, contact, email, last_location, last_person_with, last_person_with_address, last_person_with_contact, work_school_name, work_school_address, 	work_school_contact, date_report_filed, time_missing, repeat_missing, agency_enforcement,	officer, agency_phone, emergency_number, reward, family_contact, relationship_to_missing, family_email, family_fb, comments, name_who_fill_up, name_who_fill_up_relationship, name_who_fill_up_contact, posted_image) VALUES ('$user_Id', '$city_from', '$name', '$Disappearance', '$gender', '$dob', '$Pronouns', '$Race', '$Height', '$Weight', '$Hair', '$Head', '$dye', '$eye', '$scars', '$Piercings', '$Tattoos', '$Clothing', '$Footwear', '$Shoe', '$Coat', '$Head', '$Jewelry', '$Eyewear', '$Illnesses', '$Medication', '$History', '$Hobbies', '$all_gadget', '$Cell', '$PersonEmail', '$Lastlocation', '$personwith', '$Personaddress', '$Phonelastperson', '$workschool', '$Schooladdress', '$Schoolcontact', '$datefiled', '$Time', '$repeatmissing', '$lawagency', '$Assigned', '$Enforcement', '$Case', '$reward', '$Family_Guardian', '$Relationship', '$Authorized_Email', '$Authorized_fb', '$Comments', '$Completing', '$Relationship_to_Missing', '$Contact_completingform', '$file')");

                            if($save) {
	                             $_SESSION['success']  = "Missing person's information has been posted!";
	                             header("Location: posted.php");
                            } else {
                             	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                             header("Location: posted_add.php");      
                            }

                      	} else {

                      			$save = mysqli_query($conn, "INSERT INTO posted (user_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, height, weight, hair_color, head_color, dye_color, eye, teeth, scars, piercings, tattoos, clothing, footwear, shoe_size, coat, 	head_wear, jewelry, eyewear, illnesses, medication, drugs_alcohol, hobbies, gadgets, contact, email, last_location, last_person_with, last_person_with_address, last_person_with_contact, work_school_name, work_school_address, 	work_school_contact, date_report_filed, time_missing, repeat_missing, agency_enforcement,	officer, agency_phone, emergency_number, reward, family_contact, relationship_to_missing, family_email, family_fb, comments, name_who_fill_up, name_who_fill_up_relationship, name_who_fill_up_contact, posted_image) VALUES ('$user_Id', '$city_from', '$name', '$Disappearance', '$gender', '$dob', '$Pronouns', '$Race', '$Height', '$Weight', '$Hair', '$Head', '$dye', '$eye', '$all_teeth', '$scars', '$Piercings', '$Tattoos', '$Clothing', '$Footwear', '$Shoe', '$Coat', '$Head', '$Jewelry', '$Eyewear', '$Illnesses', '$Medication', '$History', '$Hobbies', '$all_gadget', '$Cell', '$PersonEmail', '$Lastlocation', '$personwith', '$Personaddress', '$Phonelastperson', '$workschool', '$Schooladdress', '$Schoolcontact', '$datefiled', '$Time', '$repeatmissing', '$lawagency', '$Assigned', '$Enforcement', '$Case', '$reward', '$Family_Guardian', '$Relationship', '$Authorized_Email', '$Authorized_fb', '$Comments', '$Completing', '$Relationship_to_Missing', '$Contact_completingform', '$file')");

                            if($save) {
	                             $_SESSION['success']  = "Missing person's information has been posted!";
	                             header("Location: posted.php");
                            } else {
                             	 $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	                             header("Location: posted_add.php");      
                            }

                      	}
                     	

                      } else {
                            	 $_SESSION['exists'] = "There was an error uploading your file.";
	                             header("Location: posted_add.php");         
                      }
				 					
				 					}
      }



		}










		if(isset($_POST['add_testimony'])) {

			$user_Id    = $_POST['user_Id'];
			$testimony  = $_POST['testimony'];
			$file       = basename($_FILES["fileToUpload"]["name"]);
			$date_added = date('Y-m-d');


			$fetch = mysqli_query($conn, "SELECT * FROM testimony WHERE user_Id='$user_Id' AND date_added='$date_added'");
			if(mysqli_num_rows($fetch) > 0) {

				$_SESSION['exists'] = "You have already added a testimony today. Please come back tomorrow for another one.";
	      header("Location: testimonials.php"); 

			} else {

				if(empty($file)) {

					$save = mysqli_query($conn, "INSERT INTO testimony (user_Id, testimony, date_added) VALUES ('$user_Id', '$testimony', '$date_added')");
					if($save) {
							$_SESSION['success'] = "You have successfully added your testimony.";
	      			header("Location: testimonials.php");
					} else {
							$_SESSION['exists'] = "Something went wrong while saving your testimony.";
	      			header("Location: testimonials.php");
					}

				} else {

							// Check if image file is a actual image or fake image
			          $target_dir = "../images-testimony/";
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
	                     	
	                      	$save = mysqli_query($conn, "INSERT INTO testimony (user_Id, testimony, testimony_image, date_added) VALUES ('$user_Id', '$testimony', '$file', '$date_added')");
	                            if($save) {
																	$_SESSION['success'] = "You have successfully added your testimony.";
											      			header("Location: testimonials.php");
															} else {
																	$_SESSION['exists'] = "Something went wrong while saving your testimony.";
											      			header("Location: testimonials.php");
															}
	                      } else {
	                            $_SESSION['exists'] = "There was an error uploading your file.";
	                            header("Location: testimonials.php");
	                      }
					 }

				}


			}



		}

?>