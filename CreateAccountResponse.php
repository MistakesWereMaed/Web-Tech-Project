<?php
session_start();
$username=$_POST['username'];
$password=$_POST['psw'];
$_SESSION['username']=$username;
$_SESSION['password']=$password;
header('Location: index.php');
?>