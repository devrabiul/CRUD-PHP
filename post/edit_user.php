<?php
require '../include/db.php';
include '../include/header.php';
include '../include/logaccess.php';
include '../include/navbar.php';

if(isset($_GET['id'])){
    $userId = $_GET['id'];
    $selectUser = "SELECT * FROM `users` WHERE id=$userId";
    $selectUser_result = mysqli_query($dbConnection, $selectUser);
    $userInfo = mysqli_fetch_assoc($selectUser_result);
    if(mysqli_num_rows($selectUser_result)>0){
      
    }else{
      header('location:../users.php');
    }
}else{
  header('location:../users.php');
}


?>

<section>
  <div class="container  pt-5">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="input_complete text-center">
          <?php
              if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
              }unset ($_SESSION['success']);
              ?>
        </div>
        <form method="POST" action="userUpdate.php" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="hidden" class="form-control" name="userid" value="<?=$userId;?>">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?=$userInfo['name'];?>">
            <div class="input_alert">
              <?php
              if (isset($_SESSION['namerr'])) {
                echo $_SESSION['namerr'];
              }unset ($_SESSION['namerr']);
              ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">User Name</label>
            <input type="text" class="form-control" name="uname" value="<?=$userInfo['user_name'];?>">
            <div class="input_alert">
              <?php
              if (isset($_SESSION['unamerr'])) {
                echo $_SESSION['unamerr'];
              }unset ($_SESSION['unamerr'])
              ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="<?=$userInfo['email'];?>">
            <div class="input_alert">
              <?php
              if (isset($_SESSION['emailrr'])) {
                echo $_SESSION['emailrr'];
              }unset ($_SESSION['emailrr'])
              ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="pass">
            <div class="input_alert">
              <?php
              if (isset($_SESSION['passrr'])) {
                echo $_SESSION['passrr'];
              }unset ($_SESSION['passrr'])
              ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="con_pass">
            <div class="input_alert">
              <?php
              if (isset($_SESSION['con_passrr'])) {
                echo $_SESSION['con_passrr'];
              }unset ($_SESSION['con_passrr'])
              ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">File</label>
            <input type="file" class="form-control" name="picture">
            <div class="input_alert">
              <?php
              if (isset($_SESSION['picturerr'])) {
                echo $_SESSION['picturerr'];
              }unset ($_SESSION['picturerr'])
              ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>

    </div>
  </div>
</section>
<?php
include'../include/footer.php';

?>