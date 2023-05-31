<?php 
include_once "../../autoload/loader.php";
$ctr = new UserController();
 $username = $_POST["username"];

 $user = $ctr->checkUsers($username);
 $count = mysqli_num_rows($user);
 if ($count > 0){
    echo "<i class='text-danger'>Username Already Exist!</i>";
 }