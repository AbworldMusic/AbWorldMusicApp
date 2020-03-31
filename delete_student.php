<?php

    include_once('db.php');

    $id=$_GET['id']; 
    
    
    $sql = "DELETE from Students WHERE id='$id'";
    
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        header("Location: students.php");    
    }

?>