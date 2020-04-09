<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');
        $name=$_POST['studentName'];
        $age=$_POST['studentAge'];
        $class=$_POST['studentClass'];
        $section=$_POST['studentSection'];
        $level=$_POST['studentLevel'];
        $parentName=$_POST['parentName'];
        $parentPhone=$_POST['parentPhone'];
        $parentEmail=$_POST['parentEmail'];
        

        $sql = "INSERT into Students (name, age, level, parentName, parentPhone, parentEmail, class, section)
                values('$name','$age','$level','$parentName', '$parentPhone', '$parentEmail', '$class', '$section')";
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: students.php");    
        }
    }
  ?> 