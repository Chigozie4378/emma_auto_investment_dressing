<?php
session_start();
include_once "../../autoload/loader.php";
$ctr  = new StaffLoginController();
$ctr->logout();
?>