<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');
        $branchId=$_POST['branchId'];
        $slotName=$_POST['slotName'];
        $assignedTo=$_POST['classes'];
        $slotTime = explode(" " , $slotName)[1]; 
        $slotTime1 = explode(":" , $slotTime)[0];
        if( strlen($slotTime1) < 2){
            $slotTime = "0".$slotTime1.":".explode(":" , $slotName)[1];
        } 
        $slotAmpm = explode(" " , $slotName)[2]; 
        
        $query = "SELECT * FROM slots 
                    WHERE branch_id='$branchId' AND slot_name='$slotName'";
        $result = mysqli_query($conn,$query);
        $count =  mysqli_num_rows($result);
        if($count== 0)
        {
        
            $sql = "INSERT into slots(branch_id, slot_name, slot_time, am_pm, assigned_to) 
                    values('$branchId','$slotName','$slotTime', '$slotAmpm','$assignedTo')";
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
            if (mysqli_query($conn, $sql)) {
                header("Location: edit_branch.php?id=".$branchId);    
            }
            else{
                echo "error";
            }    // row exists. do whatever you would like to do.
        }
        else{
            header("Location: edit_branch.php?id=".$branchId);    
            
        }
        
    }
  ?> 