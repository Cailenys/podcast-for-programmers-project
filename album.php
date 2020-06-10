<?php include("includes/includedFiles.php"); 

if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}
/** This is how it will look like the album page  **/

$album = new Album($con, $albumId);
$mentor = $album->getMentor();
$mentorId = $mentor->getId();
?>

<div class="entityInfo">

<!-- Showing the podcast cover on the left of the page-->
	<div class="leftSection">
		<img src="<?php echo $album->getPodcastCoverPath(); ?>">
	</div>

<!-- Showing the podcast info on the right of the page-->
	<div class="rightSection">
		<h2><?php echo $album->getTitle(); ?></h2>
		<p role="link" tabindex="0" onclick="openPage('mentor.php?id=<?php echo $mentorId; ?>')">By <?php echo $mentor->getName(); ?></p>
		<p><?php echo $album->getNumberOfPodcasts(); ?> Podcast(s)</p>

	</div>

</div>


<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$podcastIdArray = $album->getPodcastIds();

		$i = 1;// Starting the Podcast count in 1
		foreach($podcastIdArray as $podcastId) { // Outputting the Podcast count

			$albumPodcast = new Podcast($con, $podcastId); // Creating Podcast object and passing the connection variable (con) and the podcast ID
			$albumMentor = $albumPodcast->getMentor(); // getting mentor's function created in the Podcast class

		/* Outputting the podcast title & mentor's name, duration play and icons */
			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumPodcast->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='podcastName'>" . $albumPodcast->getTitle() . "</span>
						<span class='mentortName'>" . $albumMentor->getName() . "</span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='podcastId' value='" . $albumPodcast->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $albumPodcast->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1; //It will count the number of podcasts by incrementing the variable 'i' every time the loop goes through
		}

		?>

		<script>
			var tempPodcastIds = '<?php echo json_encode($podcastIdArray); ?>';
			tempPlaylist = JSON.parse(tempPodcastIds);
		</script>

	</ul>
</div>

<nav class="optionsMenu">
	<input type="hidden" class="podcastId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>







