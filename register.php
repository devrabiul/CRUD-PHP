<?php

require 'include/db.php';
include 'include/header.php';



?>

<section class="bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">CRUD</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="users/login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
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
        <form method="POST" action="post/register_post.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?=(isset($_SESSION['name']))?$_SESSION['name']:''?>">
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
            <input type="text" class="form-control" name="uname" value="<?=(isset($_SESSION['uname']))?$_SESSION['uname']:''?>">
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
            <input type="email" class="form-control" name="email" value="<?=(isset($_SESSION['email']))?$_SESSION['email']:''?>">
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
include 'include/footer.php';

?>