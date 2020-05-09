<?php
    
    echo "Called";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('../db.php');
        
        $image = $_FILES['image']['name'];
        $target = "images/".basename($image);



        echo $image;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
    }
  ?> 