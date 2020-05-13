<?php
    
    echo "Called";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('../db.php');
        
        $image = $_FILES['image']['name'];
        $title = $_POST['title'];
        $date = $_POST['date'];
        $posted_by = $_POST['posted_by'];
        $target = "images/".basename($image);



        $sql = "INSERT into files(title, date, posted_by, filename)
                values('$title','$date','$posted_by','$image')";


        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
        if (mysqli_query($conn, $sql)) {
            echo "Uploaded";
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
    }
  ?> 