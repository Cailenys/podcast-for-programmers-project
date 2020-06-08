<?php
include("includes/includedFiles.php");

if(isset($_GET['term'])) {
	$term = urldecode($_GET['term']);
}
else {
	$term = "";
}
?>

<div class="searchContainer">

	<h4>Search for a mentor, album or podcast</h4>
	<input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing..." onfocus="this.value = this.value">

</div>

<script>

$(".searchInput").focus();

$(function() {
	
	$(".searchInput").keyup(function() {
		clearTimeout(timer);

		timer = setTimeout(function() {
			var val = $(".searchInput").val();
			openPage("search.php?term=" + val);
		}, 2000);

	})


})

</script>

<?php if($term == "") exit(); ?>

<div class="tracklistContainer borderBottom">
	<h2>Podcats</h2>
	<ul class="tracklist">
		
		<?php
		$podcastsQuery = mysqli_query($con, "SELECT id FROM podcasts WHERE title LIKE '$term%' LIMIT 10");

		if(mysqli_num_rows($podcastsQuery) == 0) {
			echo "<span class='noResults'>No podcast found matching " . $term . "</span>";
		}



		$podcastIdArray = array();

		$i = 1;
		while($row = mysqli_fetch_array($podcastsQuery)) {

			if($i > 15) {
				break;
			}

			array_push($podcastIdArray, $row['id']);

			$albumPodcast = new Podcast($con, $row['id']);
			$albumMentor = $albumPodcast->getMentor();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumPodcast->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $albumPodcast->getTitle() . "</span>
						<span class='artistName'>" . $albumMentor->getName() . "</span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $albumPodcast->getId() . "'>
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


<div class="artistsContainer borderBottom">

	<h2>Mentor</h2>

	<?php
	$mentorsQuery = mysqli_query($con, "SELECT id FROM podcasts WHERE mentor LIKE '$term%' LIMIT 10");
	
	if(mysqli_num_rows($mentorsQuery) == 0) {
		echo "<span class='noResults'>No mentor found matching " . $term . "</span>";
	}

	while($row = mysqli_fetch_array($mentorsQuery)) {

		$mentorFound = new Mentor($con, $row['id']);

		echo "<div class='searchResultRow'>
				<div class='artistName'>

					<span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $mentorFound->getId() ."\")'>
					"
					. $mentorFound->getName() .
					"
					</span>

				</div>

			</div>";

	}


	?>

</div>

<div class="gridViewContainer">
	<h2>Album</h2>
	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM podcastcover WHERE title LIKE '$term%' LIMIT 10");

		if(mysqli_num_rows($albumQuery) == 0) {
			echo "<span class='noResults'>No podcasts found matching " . $term . "</span>";
		}

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








