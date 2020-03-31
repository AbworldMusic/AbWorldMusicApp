<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');
        $name=$_POST['facultyName'];
        $age=$_POST['facultyAge'];
        $facultyPhone=$_POST['facultyPhone'];
        $facultyEmail=$_POST['facultyEmail'];


        $sql = "INSERT into faculty(name, age, phone, email)
                values('$name','$age','$facultyPhone', '$facultyEmail')";
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: faculty.php");    
        }
        else{
            echo "error";
        }
    }
  ?> 