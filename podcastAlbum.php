<?php 

if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}
