<?php
include("../../config.php");

if(isset($_POST['mentorId'])) {
	$mentorId = $_POST['mentorId'];

	$query = mysqli_query($con, "SELECT * FROM mentors WHERE id='$mentorId'");

	$resultArray = mysqli_fetch_array($query);

	echo json_encode($resultArray);
}
?>