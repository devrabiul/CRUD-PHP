<?php
session_start();
if(isset($_SESSION['user_id'])){
    header('location:/crud/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <style>
        .full_body .row{
            height: 80vh;
            background-color: #eee;

        }

    </style>
</head>
<body>
<section class="bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php">CRUD</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link " href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <section class="full_body">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Login Form</h3>
                            <form action="login_post.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Mail Address">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="pass" placeholder="Enter Password">
                                </div>
                                <div class="mb-2 text-center">                            
                                <button type="submit" class="btn btn-success">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
  <script src="../bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>