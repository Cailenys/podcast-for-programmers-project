<?php
	ob_start();

	$timezone = date_default_timezone_set("Canada/Mountain");

	$con = mysqli_connect("localhost", "root", "", "podcasts_for_programmers");

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>