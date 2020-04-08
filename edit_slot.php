<?php
include_once('admin_check.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('db.php');
    
    $slotId=$_POST['slotId']; 
    $slotName=$_POST['editSlotName'];
    $branchId = $_POST['branchId'];
    
    $sql = "UPDATE slots set slot_name='$slotName' WHERE id='$slotId'";
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        header("Location: edit_branch.php?id=".$branchId);    
    }
}

?>