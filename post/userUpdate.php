<?php
session_start();
require '../include/db.php';
$id = $_POST['userid'];
$name =$_POST['name'];
$uname =$_POST['uname'];
$email =$_POST['email'];
$pass =$_POST['pass'];
$con_pass =$_POST['con_pass'];
$picture =$_FILES['picture'];
 
// password condition
$upperPass =preg_match('@[A-Z]@',$pass);
$lowerPass =preg_match('@[a-z]@',$pass);
$numPass =preg_match('@[0-9]@',$pass);
$symPass =preg_match('@[!,#,$,%,&,*]@',$pass);
$securePass = password_hash($pass,PASSWORD_DEFAULT);

// picture value
$fileName = $picture['name'];
$fileLocation= $picture['tmp_name'];
$fileSize=$picture['size'];

$photo_ex=explode('.',$fileName);
$extention=end($photo_ex);




if (empty($name)) {
    $_SESSION['namerr']='Enter Your Name';
    header('location:edit_user.php?id='.$id);
}elseif (empty($uname)) {
    $_SESSION['unamerr']='Enter Your Username';
    header('location:edit_user.php?id='.$id);
}elseif (empty($email)) {
    $_SESSION['emailrr']='Enter Email';
    header('location:edit_user.php?id='.$id);
}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $_SESSION['emailrr']='Enter Valid Email';
    header('location:edit_user.php?id='.$id);
}elseif (!empty($pass)) {
    if (strlen($pass)<=8) {
        $_SESSION['passrr']='Use Minimum 8 digits';
        header('location:edit_user.php?id='.$id);
    }
    elseif (!$upperPass) {
        $_SESSION['passrr']='Use Uppercase Letter';
        header('location:edit_user.php?id='.$id);
    }elseif (!$lowerPass) {
        $_SESSION['passrr']='Use Lowercase Letter';
        header('location:edit_user.php?id='.$id);
    }elseif (!$numPass) {
        $_SESSION['passrr']='Use Number';
        header('location:edit_user.php?id='.$id);
    }elseif (!$symPass) {
        $_SESSION['passrr']='Use Symbol';
        header('location:edit_user.php?id='.$id);
    }
    elseif (empty($con_pass)) {
        $_SESSION['con_passrr']='Confirm Your Password';
        header('location:edit_user.php?id='.$id);
    }elseif ($pass!==$con_pass) {
        $_SESSION['con_passrr']='Password doesn\'t match';
        header('location:edit_user.php?id='.$id);
    }else{
        if(!empty($fileName)){
            $selectUser2 = "SELECT * FROM `users` WHERE id=$id";
            $selectImageQuery =mysqli_query($dbConnection,$selectUser2);
            $collectImage = mysqli_fetch_assoc($selectImageQuery);
            $deleteImage = "../images/".$collectImage['file'];
            unlink($deleteImage);

            
            $file_upload_name = $id . '.' . $extention;
            $new_location = "../images/".$file_upload_name;
            move_uploaded_file($fileLocation,$new_location);
            $upload_file_query = "UPDATE `users` SET `name`='$name',`user_name`='$uname',`email`='$email',`password`='$securePass', `file`='$file_upload_name' WHERE id=$id";
            $uploaded_result =mysqli_query($dbConnection,$upload_file_query);
            header('location:../users.php');
        }else{
            $userUpdate = "UPDATE `users` SET `name`='$name',`user_name`='$uname',`email`='$email',`password`='$securePass' WHERE id=$id";
            $userUpdate_result=mysqli_query($dbConnection, $userUpdate);
            header('location:../users.php');
        }

       
    }
}
else{
    if(!empty($fileName)){
        $selectUser2 = "SELECT * FROM `users` WHERE id=$id";
        $selectImageQuery =mysqli_query($dbConnection,$selectUser2);
        $collectImage = mysqli_fetch_assoc($selectImageQuery);
        $deleteImage = "../images/".$collectImage['file'];
        unlink($deleteImage);

        
        $file_upload_name = $id . '.' . $extention;
        $new_location = "../images/".$file_upload_name;
        move_uploaded_file($fileLocation,$new_location);
        $upload_file_query = "UPDATE `users` SET `name`='$name',`user_name`='$uname',`email`='$email', `file`='$file_upload_name' WHERE id=$id";
        $uploaded_result =mysqli_query($dbConnection,$upload_file_query);
        header('location:../users.php');
    }else{
        $userUpdate = "UPDATE `users` SET `name`='$name',`user_name`='$uname',`email`='$email' WHERE id=$id";
    $userUpdate_result=mysqli_query($dbConnection, $userUpdate);   
    header('location:../users.php');
    }

    
}







?>