<?php 
    include_once('../db.php');

    $username=$_POST['username'];
    
    if(!$conn)
        echo "Connection failed";
    $result = mysqli_query($conn,"SELECT * FROM users");
    
    $entries = array();
    $flag = 0;
    $record =  new \stdClass();

    

    if( stripos($username,"ABSTU") != false){
        $username_elements = explode("ABSTU",$username);
        $name_abbreviation = $username_elements[0]; 
        $id = (int)$username_elements[1];
        
        $result = mysqli_query($conn,"SELECT * FROM Students WHERE id=$id");
        $record->role = 'Student';
        while($row = mysqli_fetch_array($result)){
            $record->id = $row['id'];
            $record->name = $row['name'];
            $record->brain_matrix = $row['brain_matrix'];
            $record->branch = $row['branch'];
            $flag = 1;
        }
    
    }
    else{
        $username_elements = explode("ABUSR",$username);
        $name_abbreviation = $username_elements[0]; 
        $id = (int)$username_elements[1];

        $result = mysqli_query($conn,"SELECT * FROM users WHERE id=$id");
        while($row = mysqli_fetch_array($result)){
            $record->id = $row['id'];
            $record->role = $row['role'];
            $record->phone = $row['phone'];
            $record->name = $row['name'];
            $flag = 1;
        }
    }
    $record->flag = $flag;
    array_push($entries, $record);   
    echo json_encode($entries);
?>