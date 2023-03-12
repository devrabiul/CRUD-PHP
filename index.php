<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Crud</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <style>
        .full_body .row {
            height: 80vh;
            background-color: #eee;

        }
        .ht_5{
            font-size: 6rem;
            font-weight: 600;
        } 
    </style>
</head>

<body>
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
                            <a class="nav-link" href="/crud/users.php">Users</a>
                        </li>
                    <?php if(!isset($_SESSION['user_id'])){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="users/login.php">Login</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <section class="full_body">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center">
                    <h3>Welcome In Ghost World</h3>
                    <h1 class="ht_5">CRUD Project</h1>
                    <?php if(!isset($_SESSION['user_id'])){ ?>
                    <div class="pt-3">
                        <a href="register.php" class="btn btn-info btn-lg m-2 text-white">Register Now</a>

                        <a href="users/login.php" class="btn btn-info btn-lg m-2 text-white">Login Here</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>