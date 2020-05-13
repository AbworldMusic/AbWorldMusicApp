<?php 
    include_once('../db.php');

    $id= $_POST['id'];

    $result = mysqli_query($conn,"SELECT * FROM Students WHERE id='$id'");

    $entries = array();
    
    while($row = mysqli_fetch_array($result)){
        $record =  new \stdClass();
        $record->name = $row['name'];
        $record->brain_matrix = $row['brain_matrix'];
        $record->class = $row['class'];
        $record->section = $row['section']; 
        $record->branch = $row['branch']; 
        
        
        array_push($entries, $record);   
    }

    echo json_encode($entries);

?>