<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');
        $name=$_POST['productName'];
        $branch_id=$_POST['branchId'];
        $total=$_POST['total'];
        $good=$_POST['good'];
        $bad=$_POST['bad'];
        $average=$_POST['average'];
        

        $sql = "INSERT into inventory(product_name, branch_id, total, good, bad, average)
                values('$name','$branch_id','$total', '$good', '$bad','$average')";
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: inventory.php");    
        }
        else{
            echo "error";
        }
    }
  ?> 