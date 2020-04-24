<?php

    include_once('db.php');
    include_once('admin_check.php');

    $id=$_GET['id']; 
    $branch_id=$_GET['branch_id']; 
    
    
    $sql = "DELETE from slots WHERE id='$id'";
    
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        header("Location: edit_branch.php?id=".$branch_id);    
    }

?>