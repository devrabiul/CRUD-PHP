<?php
require '../include/db.php';

$userId = $_GET['id'];
$selectUser = mysqli_query($dbConnection, "SELECT * FROM `users` WHERE id=$userId");
$fetchAssoc = mysqli_fetch_assoc($selectUser);

if($fetchAssoc['status']==1){
    $statusUpdate =mysqli_query($dbConnection,"UPDATE `users` SET `status`=0 WHERE id=$userId");
    header('location:../users.php');
}else{
    $statusUpdate =mysqli_query($dbConnection,"UPDATE `users` SET `status`=1 WHERE id=$userId");
    header('location:../users.php');
}


