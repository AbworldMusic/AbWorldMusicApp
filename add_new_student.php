<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');
        $name=$_POST['studentName'];
        $age=$_POST['studentAge'];
        $level=$_POST['studentLevel'];
        $parentName=$_POST['parentName'];
        $parentPhone=$_POST['parentPhone'];
        $parentEmail=$_POST['parentEmail'];
        

        $sql = "INSERT into Students (name, age, level, parentName, parentPhone, parentEmail)
                values('$name','$age','$level','$parentName', '$parentPhone', '$parentEmail')";
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: students.php");    
        }
    }
  ?> 