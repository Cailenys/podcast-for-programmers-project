<?php
 include("includes/includedFiles.php"); 
 //die("firstTest");
 var_dump($_POST);
 var_dump($_FILES);
    //if(isset($_FILES['audio'])){
      //die("otherTest");
       $maxsize = 52428800; // 5MB
       
       $file = $_FILES['audio']['name'];
       $path = pathinfo($file);
       $filename = $path['filename'];
       $ext = $path['extension'];

       $mentor = $_POST['mentor'];
       $category = $_POST['category'];
       $name = $_FILES['audio']['name'];
       $target_dir = "./assets/uploads/";
       $target_file = $target_dir . $_FILES["audio"]["name"];

       // Select file type
       $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp3","avi","mp4","wma","wav");

       // Check extension
       if( in_array($ext,$extensions_arr) ){
         die("test");
          // Check file size
          if(($_FILES['audio']['size'] >= $maxsize) || ($_FILES["audio"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['audio']['tmp_name'],$target_file)){
              // Insert record
              $query = "INSERT INTO podcasts(title,mentor, category, path) VALUES('".$name."', 3,3,'".$target_file."')";

              $query = mysqli_query($con,$query);
              if($query)
              {
              echo "Upload successfully.";
              }
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
    // } 
     ?>

<!doctype html>
<html>
    <body>
    <form action="#" method="post" enctype="multipart/form-data">
      <input type='file' placeholder="e.g. JavaScript best practices"  name='audio' />
      <input type='name' placeholder="e.g. JavaScript" name='category' />
      <input type='name' placeholder="e.g. Donald Macduck" name='mentor' />
      <input type='submit' value='Upload' name='upload'>
    </form>

    <div>
   
    </div>

  </body>
</html>