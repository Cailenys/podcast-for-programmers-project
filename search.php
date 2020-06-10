<?php
include("includes/includedFiles.php");

if(isset($_GET['term'])) {
	$term = urldecode($_GET['term']); //Allows to search using spaces in between words
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

$(".searchInput").focus(); // It would give the input field focus as soon as the page loads

$(function() { // It refresh the search page 
	
	$(".searchInput").keyup(function() { // As soon the user start typing it cancels the existing timer
		clearTimeout(timer);

		timer = setTimeout(function() {
			var val = $(".searchInput").val();
			openPage("search.php?term=" + val);
		}, 2000); // 2000 milliseconds (2seg) before executing the setTimeout function

	})


})

</script>

<?php if($term == "") exit(); ?>

<div class="tracklistContainer borderBottom">
	<h2>Podcats</h2>
	<ul class="tracklist">
		
	<!-- Searching for a Podcast -->
	<?php
		$podcastsQuery = mysqli_query($con, "SELECT id FROM podcasts WHERE title LIKE '$term%' LIMIT 10"); 
																											
		if(mysqli_num_rows($podcastsQuery) == 0) {
			echo "<span class='noResults'>No podcast found matching " . $term . "</span>";
		}

		//Using the percentage after 'term', the search will return any characters after the characters typed 
		// (the additional characters in the sentence)


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
						<span class='mentorName'>" . $albumMentor->getName() . "</span>
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

<!-- Searching for a specific mentor's name -->

<div class="mentorContainer borderBottom">

	<h2>Mentors</h2>

	<?php
	$mentorsQuery = mysqli_query($con, "SELECT id FROM mentors WHERE name LIKE '%$term%' LIMIT 10");
	///Using the percentage after and before or term, the search will return any characters after and before the characters typed 
	if(mysqli_num_rows($mentorsQuery) == 0) {
		echo "<span class='noResults'>No mentor found matching " . $term . "</span>";
	}

	while($row = mysqli_fetch_array($mentorsQuery)) {

		$mentorFound = new Mentor($con, $row['id']);

		echo "<div class='searchResultRow'>
				<div class='mentorName'>

					<span role='link' tabindex='0' onclick='openPage(\"mentor.php?id=" . $mentorFound->getId() ."\")'>
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


</div>

<nav class="optionsMenu">
	<input type="hidden" class="podcastId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>








