<?php
if(!isset($_SESSION['user_id'])){
    header('location:/crud/users/login.php');
}
?>