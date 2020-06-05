<?php
include("includes/config.php");


//session_destroy(); LOGOUT Manually logout

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");// It will redirect the user to the register page
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome to Podcast for Programmers! </title>
    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
</head>
<body>
<!--Outputting the podcast-covers -->
<h1 class="pageHeadingBig"> You might also like</h1>
<div class="gridViewContainer">
	<?php
	  $podcastcoverQuery = mysqli_query($con, "SELECT * FROM podcasts ORDER BY RAND() LIMIT 10");
	   while($row=mysqli_fetch_array($podcastcoverQuery)){
		   echo "<div class='gridViewItem'>   
		<img src='" . $row['podcastcover']."'>
			<div class='gridViewInfo'>"
			.$row['title'].
			"</div>
		   </div>";
	   }
	?>
</div>

<!---------------------------------------------------->

<div id="mainContainer">

	<div id="topContainer">
		<?php include("includes/navBarContainer.php"); ?>
	</div>


	<?php include("includes/playingBar.php"); ?>
	
 <div>
</body>

</html>