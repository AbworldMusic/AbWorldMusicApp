<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');

        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $role=$_POST['role'];

        $sql = "INSERT into users (name,password, email, phone, role)
                values('$name','$password','$email','$phone','$role')";
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: users.php");    
        }
    }
  ?> 