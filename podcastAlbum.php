<?php include("includes/header.php"); 

if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$podcastQuery = mysqli_query($con, "SELECT * FROM podcastcover WHERE id='$albumId'");
$album = mysqli_fetch_array($podcastQuery);

$mentor = new Mentor($con, $album['mentor']);

echo $album['title'] . "<br>";
echo $mentor->getName();

?>







<?php include("includes/footer.php"); ?>