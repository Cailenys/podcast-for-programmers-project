<?php include("includes/header.php"); 

if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$album = new Album($con, $albumId);
$mentor = $album->getMentor();

?>
<div class="entityInfo">

	<div class="leftSection">
		<img src="<?php echo $album->getPodcastCoverPath(); ?>">
	</div>

	<div class="rightSection">
		<h2><?php echo $album->getTitle(); ?></h2>
		<p>By <?php echo $mentor->getName(); ?></p>
		<p><?php echo $album->getNumberOfPodcasts(); ?></p>
	</div>

</div>


<div class="podcastListContainer">
	<ul class="podcastList">
		
		<?php
		$podcastIdArray = $album->getPodcastIds();

		$i = 1;
		foreach($podcastIdArray as $podcastId) {
             echo $podcastId. "<br>";
		
		}

		?>

	

	</ul>
</div>



<?php include("includes/footer.php"); ?>




