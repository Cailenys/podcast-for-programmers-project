 <?php
 include("includes/includedFiles.php"); 
     $fetchAudio = mysqli_query($con, "SELECT path FROM podcasts ORDER BY id DESC");
     while($row = mysqli_fetch_assoc($fetchAudio)){
       $location = $row['path'];
 
       echo "<div >";
       echo "<audio src='".$location."' controls width='320px' height='200px' >";
       echo "</div>";
     }
?>