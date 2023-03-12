<?php
require 'include/db.php';
include 'include/header.php';
include 'include/logaccess.php';
include 'include/navbar.php';


$selectTable_result = mysqli_query($dbConnection, "SELECT * FROM `users`");

?>

<section>
    
    <div class="container  pt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($selectTable_result as $user){?>

                        <tr>
                            <td><?=$user['id']?></td>
                            <td>
                                <img src="images/<?=$user['file']?>" alt="No image" width="50" height="50" style="border-radius:50%">
                            </td>
                            <td><?=$user['name']?></td>
                            <td><?=$user['user_name']?></td>
                            <td><?=$user['email']?></td>
                            <td>
                                <?php if($user['status']==1){ ?>
                                    <a href="users/status.php?id=<?=$user['id']?>" class="btn btn-success">Active</a>

                                <?php }else{ ?>
                                    <a href="users/status.php?id=<?=$user['id']?>" class="btn btn-danger">Deactive</a>                                                                  
                               <?php } ?>
                                                           
                            </td>
                            <td>
                            <a href="post/view_user.php?id=<?=$user['id']?>" class="btn btn-primary">View</a>
                            <span> </span>
                            <a href="post/edit_user.php?id=<?=$user['id']?>" class="btn btn-primary">Edit</a>
                                <span> </span>
                                <a href="post/delete_user.php?id=<?=base64_encode($user['id'])?>" class="btn btn-primary">Delete</a>
                            </td>
                    
                            
                        </tr>
                            <?php } ?>
                        
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</section>
<?php
include'include/footer.php';

?>