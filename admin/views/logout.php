<?php
session_start();
include_once "../../autoload/loader.php";
$ctr  = new AdminLoginController();
$ctr->logout();
?>