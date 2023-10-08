<?php 
	session_start();
	include '../config.php';

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

		$delete = mysqli_query($conn, "UPDATE posted SET status='Missing' WHERE post_Id='$post_Id'");
		if($delete) {
			$_SESSION['success']  = "Record has been deleted!";
	        header("Location: found_posted.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: found_posted.php");
		}
	}

?>