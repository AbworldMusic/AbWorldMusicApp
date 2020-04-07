<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');
        $branchId=$_POST['branchId'];
        $slotName=$_POST['slotName'];
        
        $sql = "INSERT into slots(branch_id, slot_name)
                values('$branchId','$slotName')";
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: edit_branch.php?id=".$branchId);    
        }
        else{
            echo "error";
        }
    }
  ?> 