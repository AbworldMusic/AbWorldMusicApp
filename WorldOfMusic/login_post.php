<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('../db.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if(!$conn)
        echo "Connection failed";
    $result = mysqli_query($conn,"SELECT * FROM users WHERE organization_id=2");
    $slno = 1;
    session_start();
    while($row = mysqli_fetch_array($result)){
        if($row['name']==$username || $row['email']==$username){
            if($row['password']==$password){
                $_SESSION["email"] = $username;
                $_SESSION["flash"]= "Logged in sucessfully";
                $_SESSION["role"] = $row["role"];
                header("Location: enrollment.php");
            }
            else{ 
                $_SESSION["flash"]= "incorrect password";
                header("Location: login.php");
            }
        }
        else{
            $_SESSION["flash"]= "user is not registered";
            header("Location: login.php");
        }

    }
}
