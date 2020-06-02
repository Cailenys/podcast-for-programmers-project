<?php

includes("includes/config.php");

//session_destroy(); Manually logout

if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
 else{
     header("Location: resgister.php"); // It will redirect the user to the register page
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome to Podcast for Programmers! </title>
</head>
<body>
<?php

include("./navigation.php"); // Navigation - for testing
 
?>
   <h1> Hello! <h1>
</body>
</html>