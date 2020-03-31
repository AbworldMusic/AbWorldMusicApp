<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');
        $name=$_POST['branchName'];
        $incharge=$_POST['branchIncharge'];
        $phone=$_POST['branchPhone'];
        $capacity=$_POST['branchCapacity'];


        $sql = "INSERT into branches(name, incharge, phone, capacity)
                values('$name','$incharge','$phone', '$capacity')";
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: branches.php");    
        }
        else{
            echo "error";
        }
    }
  ?> 