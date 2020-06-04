<?php
 $con = mysqli_connect("localhost","root","","test");
 session_start();
 if(isset($_POST["notes"]))
 {
	 $diary = $_POST["notes"];
	 $email = $_SESSION['user_email'];
	 $insert_notes = "update diary_users set user_diary = '$diary' where user_email='$email'";
	 $query = mysqli_query($con,$insert_notes);
	 header('location:home.php');
 }
?>
