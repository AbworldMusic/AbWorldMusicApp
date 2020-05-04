<?php 
    include_once('../db.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if(!$conn)
        echo "Connection failed";
    $result = mysqli_query($conn,"SELECT * FROM users");
    
    $entries = array();
    while($row = mysqli_fetch_array($result)){
        $record =  new \stdClass();
                
        if($row['name']==$username || $row['email']==$username){
            if($row['password']==$password){
                $record->id = $row['id'];
                $record->flag = 1;
                $record->role = $row['role'];
            }
            else{
                $record->flag = 0;
            }
        }
        else{
            $record->flag = 0;
        }
        array_push($entries, $record);   
    }
    echo json_encode($entries);
?>