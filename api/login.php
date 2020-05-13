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
    while($row = mysqli_fetch_array($result)){
        
                
        if($row['name']==$username || $row['email']==$username){
            if($row['password']==$password){
                $record->id = $row['id'];
        
                $flag = 1;
                $record->role = $row['role'];
                $record->flag = $flag;
            }
        }
        
    }
    
    if($flag==0){
        $result1 = mysqli_query($conn,"SELECT * FROM Students WHERE name='$username'");
        while($row1 = mysqli_fetch_array($result1)){
            if($row1['password']==$password){
                $record->id = $row1['id'];
        
                $flag = 1;
                $record->role = "Student";
                $record->flag = $flag;
            }
        }
        
        
    }
    array_push($entries, $record);   
    echo json_encode($entries);
?>