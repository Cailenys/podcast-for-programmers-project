<?php
include("includes/includedFiles.php");

if(isset($_GET['id'])) {
	$mentorId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$mentor = new Mentor($con, $mentorId);
?>

<div class="entityInfo borderBottom">

	<div class="centerSection">

		<div class="mentorInfo">

			<h1 class="mentorName"><?php echo $mentor->getName(); ?></h1>

			<div class="headerButtons">
				<button class="button green" onclick="playFirstPodcast()">PLAY</button>
			</div>

		</div>

	</div>

</div>


<div class="tracklistContainer borderBottom">
	<h2>Podcasts</h2>
	<ul class="tracklist">
		
		<?php
		$podcastIdArray = $mentor->getPodcastIds();

		$i = 1;
		foreach($podcastIdArray as $podcastId) {

			if($i > 5) {
				break;
			}

			$albumPodcast = new Podcast($con, $podcastId);
			$albumMentor = $albumPodcast->getMentor();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumPodcast->getId() . "\", tempPlaylist, true)'>
						<span class='podcastNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='podcastName'>" . $albumPodcast->getTitle() . "</span>
						<span class='mentorName'>" . $albumMentor->getName() . "</span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='podcastId' value='" . $albumPodcast->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $albumPodcast->getDuration() . "</span>
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

<div class="gridViewContainer">
	<h2>Albums</h2>
	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM podcastcover WHERE mentor='$mentorId'");

		while($row = mysqli_fetch_array($albumQuery)) {
			
			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
						<img src='" . $row['podcastCoverPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";



		}
	?>

</div>

<nav class="optionsMenu">
	<input type="hidden" class="podcastId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>