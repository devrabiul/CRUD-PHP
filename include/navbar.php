 <?php
$loggedUser = $_SESSION['user_id'];
$query = mysqli_query($dbConnection,"SELECT * FROM users WHERE id=$loggedUser");
$result = mysqli_fetch_assoc($query);
?>





<section class="bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/crud/index.php">Project</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/crud/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/crud/users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/crud/users.php"><?=$result['name']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/crud/users.php">
                            <img src="/crud/images/<?=$result['file']?>" height="30" width="30" style="border-radius: 50%;" alt="">
                        </a>
                        </li>
                        <?php
                        if(isset($_SESSION['user_id'])){
                     
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/crud/users/logout.php">Logout</a>
                        </li>
                        <?php }else{?>
                        <li class="nav-item">
                            <a class="nav-link" href="/crud/users/logout.php">Login</a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>