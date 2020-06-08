<?php include("includes/includedFiles.php"); 

if(isset($_GET['id'])) {
	$playlistId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$playlist = new Playlist($con, $playlistId);
$owner = new User($con, $playlist->getOwner());
?>

<div class="entityInfo">

	<div class="leftSection">
		<div class="playlistImage">
			<img src="assets/images/icons/playlist.png">
		</div>
	</div>

	<div class="rightSection">
		<h2><?php echo $playlist->getName(); ?></h2>
		<p>By <?php echo $playlist->getOwner(); ?></p>
		<p><?php echo $playlist->getNumberOfPodcasts(); ?> Podcasts</p>
		<button class="button" onclick="deletePlaylist('<?php echo $playlistId; ?>')">Delete Playlist </button>

	</div>

</div>


<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$podcastIdArray = $playlist->getPodcastIds();

		$i = 1;
		foreach($podcastIdArray as $podcastId) {

			$playlistPodcast = new Podcast($con, $podcastId);
			$podcastMentor = $playlistPodcast->getMentor();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $playlistPodcast->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $playlistPodcast->getTitle() . "</span>
						<span class='artistName'>" . $podcastMentor->getName() . "</span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class= podcastId' value='" . $playlistPodcast->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $playlistPodcast->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
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
	<div class="item" onclick="removeFromPlaylist(this, '<?php echo $playlistId; ?>')">Remove from Playlist</div>
</nav>









