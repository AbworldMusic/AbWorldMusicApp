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
                $_SESSION["email"] = $username;
                $_SESSION["flash"]= "Logged in sucessfully";
                $_SESSION["role"] = $row["role"];
                header("Location: admin_home.php");
            }
            else{
                $_SESSION["flash"]= "incorrect password";
                header("Location: index.php");
            }
        }
        else{
            $_SESSION["flash"]= "user is not registered";
            header("Location: index.php");
        }
    }
?>