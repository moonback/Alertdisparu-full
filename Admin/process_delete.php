<?php 
	session_start();
	include '../config.php';


	// DELETE ADMIN
	if(isset($_POST['delete_admin'])) {
		$admin_Id = $_POST['admin_Id'];

		$delete = mysqli_query($conn, "DELETE FROM admin WHERE admin_Id='$admin_Id'");
		if($delete) {
			$_SESSION['success']  = "Admin information has been deleted!";
	        header("Location: admin.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: admin.php");
		}
	}



	// DELETE USER
	if(isset($_POST['delete_user'])) {
		$user_id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_id'");
		if($delete) {
			$_SESSION['success']  = "User information has been deleted!";
	        header("Location: users.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: users.php");
		}
	}


	// DELETE MISSING
	if(isset($_POST['delete_missing'])) {
		$post_Id = $_POST['post_Id'];

		$delete = mysqli_query($conn, "DELETE FROM posted WHERE post_Id='$post_Id'");
		if($delete) {
			$_SESSION['success']  = "Record has been deleted!";
	        header("Location: posted.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: posted.php");
		}
	}



	// DELETE FOUND
	if(isset($_POST['delete_found'])) {
		$post_Id = $_POST['post_Id'];

		$delete = mysqli_query($conn, "DELETE FROM posted WHERE post_Id='$post_Id'");
		if($delete) {
			$_SESSION['success']  = "Record has been deleted!";
	        header("Location: found_posted.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: found_posted.php");
		}
	}


	// DELETE TESTIMONY
	if(isset($_POST['delete_testimony'])) {
		$testimony_Id = $_POST['testimony_Id'];

		$delete = mysqli_query($conn, "DELETE FROM testimony WHERE testimony_Id='$testimony_Id'");
		if($delete) {
			$_SESSION['success']  = "Record has been deleted!";
	        header("Location: testimonials.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: testimonials.php");
		}
	}

?>