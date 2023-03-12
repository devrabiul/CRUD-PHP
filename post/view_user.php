<?php
require '../include/db.php';
include '../include/header.php';
include '../include/navbar.php';



$userId = $_GET['id'];
$selectUser = "SELECT * FROM `users` WHERE id=$userId";
$selectUser_result = mysqli_query($dbConnection, $selectUser);
$userInfo = mysqli_fetch_assoc($selectUser_result);
?>
<style>
    .full_body{
        height: 90vh;
        /* background-color: #a3a3a3; */
    }
    .mycard{
        background-color: #fff;
        border-radius: 8px;
        border: 1px solid #80808055;
        box-shadow: -1px -1px 10px 5px #DEDEDE;
    }
    .card_img{
        height: 150px;
        width: 150px;
        border-radius: 50%;
    }
</style>


<div class="container-fluid">
    <div class="row justify-content-center align-items-center full_body">
        <div class="col-md-3">
            <div class="text-center p-4 mycard">
                <img class="card_img" src="../images/<?=$userInfo['file']?>" alt="">
                <h3 class="pt-3"><?=$userInfo['name']?></h3>
                <h6><small><?=$userInfo['user_name']?></small></h6>
                <h5><?=$userInfo['email']?></h5>
            </div>
        </div>
    </div>
</div>


<?php
include '../include/footer.php';
?>