<?php 
    include_once('../db.php');

    $branchId= $_GET['id'];
    $result = mysqli_query($conn,"SELECT * FROM slots WHERE branch_id='$branchId' order by am_pm, slot_time");
    $entries = array();
    
    while($row = mysqli_fetch_array($result)){
        $record =  new \stdClass();
        $record->slot_name = $row['slot_name'];
        $record->assigned_to = $row['assigned_to'];
        
        array_push($entries, $record);   
    }

    echo json_encode($entries);
?>