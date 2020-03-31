<?php 
include_once('header.php');
session_start();

if(!isset($_SESSION['email']) || !isset($_SESSION["role"])){
    $_SESSION["flash"] = "Login to continue";
    header("Location: index.php");
}
?>