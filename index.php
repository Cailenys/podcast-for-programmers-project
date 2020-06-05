<?php include("includes/header.php"); ?>

<h1 class="pageHeadingBig">You might also like</h1>

<div class="gridViewContainer">

	<?php
        $podcastcoverQuery = mysqli_query($con, "SELECT * FROM podcastcover ORDER BY RAND() LIMIT 10");

		while($row = mysqli_fetch_array($podcastcoverQuery)) {
			

			echo "<div class='gridViewItem'>
					<a href='podcastAlbum.php?id=" . $row['id'] . "'>
						<img src='" . $row['podcastCoverPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</a>

				</div>";



		}
	?>

</div>





<?php include("includes/footer.php"); ?>