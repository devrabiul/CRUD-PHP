<?php                                                                                                                                                   
session_start();
require '../include/db.php';

$name = $_POST['name'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$con_pass = $_POST['con_pass'];
$picture = $_FILES['picture'];
 

// password condition
$upperPass = preg_match('@[A-Z]@',$pass);
$lowerPass = preg_match('@[a-z]@',$pass);
$numPass = preg_match('@[0-9]@',$pass);
$symPass = preg_match('@[!,#,$,%,&,*]@',$pass);
$securePass = password_hash($pass,PASSWORD_DEFAULT);


$fileName = $picture['name'];
$fileLocation= $picture['tmp_name'];
$fileSize=$picture['size'];

$photo_ex=explode('.',$fileName);
$extention=end($photo_ex);


// old data
$_SESSION['name'] = $name;
$_SESSION['uname'] = $uname;
$_SESSION['email'] = $email;


if (empty($name)) {
    $_SESSION['namerr']='Enter Your Name';
    header('location:../register.php');
}elseif (empty($uname)) {
    $_SESSION['unamerr']='Enter Your Username';
    header('location:../register.php');
}elseif (empty($email)) {
    $_SESSION['emailrr']='Enter Email';
    header('location:../register.php');
}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $_SESSION['emailrr']='Enter Valid Email';
    header('location:../register.php');
}elseif (empty($pass)) {
    $_SESSION['passrr']='Enter Your Password';
    header('location:../register.php');
}elseif (strlen($pass)<=8) {
    $_SESSION['passrr']='Use Minimum 8 digits';
    header('location:../register.php');
}
elseif (!$upperPass) {
    $_SESSION['passrr']='Use Uppercase Letter';
    header('location:../register.php');
}elseif (!$lowerPass) {
    $_SESSION['passrr']='Use Lowercase Letter';
    header('location:../register.php');
}elseif (!$numPass) {
    $_SESSION['passrr']='Use Number';
    header('location:../register.php');
}elseif (!$symPass) {
    $_SESSION['passrr']='Use Symbol';
    header('location:../register.php');
}
elseif (empty($con_pass)) {
    $_SESSION['con_passrr']='Confirm Your Password';
    header('location:../register.php');
}elseif ($pass!==$con_pass) {
    $_SESSION['con_passrr']='Password doesn\'t match';
    header('location:../register.php');
}
elseif (empty($picture['name'])) {
    $_SESSION['picturerr']='Upload a picture';
    header('location:../register.php');
}
else{

    $insertUser ="INSERT INTO `users`(`name`, `user_name`, `email`, `password`) VALUES ('$name','$uname','$email','$securePass')";
    $insertUser_result =mysqli_query($dbConnection,$insertUser);

    $file_id = mysqli_insert_id($dbConnection);
    $file_upload_name = $file_id . '.' . $extention;
    $new_location = "../images/".$file_upload_name;
    move_uploaded_file($fileLocation,$new_location);

    $upload_file_query = "UPDATE `users` SET `file`='$file_upload_name' WHERE id=$file_id";
    $uploaded_result =mysqli_query($dbConnection,$upload_file_query);


    unset ($_SESSION['name']);
    unset ($_SESSION['uname']);
    unset ($_SESSION['email']);
    $_SESSION['success']='Successfully Registered';
    header('location:../register.php');

}





?>