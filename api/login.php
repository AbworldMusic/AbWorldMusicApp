<?php 
    include_once('../db.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if(!$conn)
        echo "Connection failed";
    $result = mysqli_query($conn,"SELECT * FROM users");
    
    $entries = array();
    $flag = 0;
    $record =  new \stdClass();

    

    if( stripos($username,"ABSTU") != false){
        $username_elements = $username.explode("ABSTU");
        $name_abbreviation = $username_elements[0]; 
        $id = $username_elements[1];
        
        $result = mysqli_query($conn,"SELECT * FROM Students WHERE id=$id");
        $record->role = 'Student';
        while($row = mysqli_fetch_array($result)){
            $record->name = $row['name'];
            $record->brain_matrix = $row['brain_matrix'];
            $record->branch = $row['branch'];
            $flag = 1;
        }
    
    }
    else{
        $result = mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
        $username_elements = $username.explode("ABUSR");
        $name_abbreviation = $username_elements[0]; 
        $id = $username_elements[1];

        while($row = mysqli_fetch_array($result)){
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