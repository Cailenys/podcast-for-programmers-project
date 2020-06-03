<?php
include("./navigation.php"); // Navigation - for testing
include("includes/config.php");

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
    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
                            <!-- Script(s): -->
<script src="https://kit.fontawesome.com/792d72ca72.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="playingBarContainer">
    <div id="playingBar">
        <div id="playingLeft">

        </div>
        <div id="playingCenter">
            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle button">
                        <img src="./assets/images/icons/shuffle.png" alt="Shuffle">
                     </button>

                     <button class="controlButton previous" title="Previous button">
                        <img src="./assets/images/icons/previous.png" alt="Previous">
                     </button>

                     <button class="controlButton play" title="Play button">
                        <img src="./assets/images/icons/play.png" alt="Play">
                     </button>
                     <button class="controlButton pause" title="Pause button">
                        <img src="./assets/images/icons/pause.png" alt="Pause">
                     </button>

                     <button class="controlButton next" title="Next button">
                        <img src="./assets/images/icons/next.png" alt="Next">
                     </button>

                     <button class="controlButton repeat" title="Repeat button">
                        <img src="./assets/images/icons/repeat.png" alt="Repeat">
                     </button>
                </div>
                <div class="playbackBar">
                    <span class="progressTime currentTime">0.00</span>
                    <div class="progressBar">
                        <div class="progressBarBackground"></div>
                            <div class="progress">
                                
                            </div>
                    </div>
                    <span class="progressTime remainingTime">0.00</span>
                </div>
            </div>
        </div>
         

         <div id="playingRight">
         </div>
    </div>

</div>
</body>
</html>