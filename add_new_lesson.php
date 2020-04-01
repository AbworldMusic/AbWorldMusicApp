<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');
        $title=$_POST['title'];
        $description=$_POST['description'];
        $description = str_replace("'", "''", $description);
        $category=$_POST['category'];
        $level=$_POST['level'];

        $image = $_FILES['image']['name'];
        $target = "images/".basename($image);



        $sql = "INSERT into lessons(title, category, level, description, image)
                values('$title','$category', '$level','$description','$image')";

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: lessons.php");    
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
  ?> 