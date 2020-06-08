<?php
include("../../config.php");


if(isset($_POST['playlistId']) && isset($_POST['podcastId'])) {
	$playlistId = $_POST['playlistId'];
	$podcastId = $_POST['podcastId'];

	$orderIdQuery = mysqli_query($con, "SELECT MAX(playlistOrder) + 1 as playlistOrder FROM playlistpodcasts WHERE playlistId='$playlistId'");
	$row = mysqli_fetch_array($orderIdQuery);
	$order = $row['playlistOrder'];

	$query = mysqli_query($con, "INSERT INTO playlistpodcasts  VALUES('', '$podcastId', '$playlistId', '$order')");

}
else {
	echo "PlaylistId or podcastId was not passed into addToPlaylist.php";
}



?>