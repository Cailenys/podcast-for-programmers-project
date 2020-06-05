<?php include("includes/header.php"); 

if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$album = new Album($con, $albumId);
$mentor = $album->getMentor();
echo $album->getTitle() . "<br>";
echo $mentor->getName();

?>


<?php include("includes/footer.php"); ?>