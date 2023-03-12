<?php
require "../include/db.php";

$collectData =base64_decode($_GET['id']);

$selectUser2 = "SELECT * FROM `users` WHERE id=$collectData";
$selectImageQuery =mysqli_query($dbConnection,$selectUser2);
$collectImage = mysqli_fetch_assoc($selectImageQuery);
$deleteImage = "../images/".$collectImage['file'];
unlink($deleteImage);


$selectUser ="DELETE FROM `users` WHERE id=$collectData";
$result = mysqli_query($dbConnection,$selectUser);
header('location:../users.php');
?>