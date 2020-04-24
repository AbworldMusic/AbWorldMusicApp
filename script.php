<?php 
    include_once('db.php');
    $result = mysqli_query($conn,"SELECT * FROM slots");
    while($row = mysqli_fetch_array($result)){
        
        $slotTime = explode(" " , $row['slot_name'])[1];
        $am_pm = explode(" " , $row['slot_name'])[2];

        $slotId = $row['id'];
        if( strlen($slotTime) < 2){
            $slotTime = "0".$slotTime.":".explode(":" , $row['slot_time'])[1];
        }    
            $sql = "UPDATE slots set slot_time='$newslotTime' WHERE id='$slotId'";
            $count = 0; 
            if (mysqli_query($conn, $sql)) {
                $count = $count+1;
                echo "row ".$count." updated<br>";
            }
        
    
    }