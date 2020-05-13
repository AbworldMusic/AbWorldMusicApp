<?php 
    include_once('../db.php');

    $result = mysqli_query($conn,"SELECT * FROM files order by id");

    $entries = array();
    
    while($row = mysqli_fetch_array($result)){
        $record =  new \stdClass();
        $record->title = $row['title'];
        $record->filename = $row['filename'];
        $record->date = $row['date'];
        $record->posted_by = $row['posted_by']; 
        
        array_push($entries, $record);   
    }

    echo json_encode($entries);

?>