<?php
session_start();
require '../include/db.php';

$user_email = $_POST['email'];
$user_pass = $_POST['pass'];

$select_email = "SELECT COUNT(*) as exist FROM users WHERE email='$user_email'";
$select_email_result = mysqli_query($dbConnection, $select_email);
$after_assoc = mysqli_fetch_assoc($select_email_result);
if ($after_assoc['exist'] == 1) {
    $select_email2 = "SELECT * FROM users WHERE email='$user_email'";
    $select_email_result2 = mysqli_query($dbConnection, $select_email2);
    $after_assoc2 = mysqli_fetch_assoc($select_email_result2);

    if (password_verify($user_pass,$after_assoc2['password'])) { 
        $_SESSION['user_id']= $after_assoc2['id'];    
        $_SESSION['user_mail']= $after_assoc2['email'];    
        header('location:../users.php');
    }
else{    
    header('location:../index.php');
    }
}else{  
    header('location:login.php');
}
?>