<?php
include("../../config.php");

if(isset($_POST['playlistId']) && isset($_POST['podcastId'])) {
	$playlistId = $_POST['playlistId'];
	$podcastId = $_POST['podcastId'];

	$query = mysqli_query($con, "DELETE FROM playlistpodcasts WHERE playlistId='$playlistId' AND podcastId='$podcastId'");
}
else {
	echo "PlaylistId or podcastId was not passed into removeFromPlaylist.php";
}


?>