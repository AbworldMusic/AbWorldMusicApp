<?php 
    include_once('db.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if(!$conn)
        echo "Connection failed";
    $result = mysqli_query($conn,"SELECT * FROM users");
    $slno = 1;
    session_start();
    while($row = mysqli_fetch_array($result)){
        if($row['name']==$username || $row['email']==$username){
            if($row['password']==$password){
                echo "1";
            }
            else{
                echo "0";
            }
        }
        else{
            echo "0";
        }
    }
?>