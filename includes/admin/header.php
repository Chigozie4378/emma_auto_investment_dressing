<?php
session_start();
include_once "../../autoload/loader.php";
Session::adminAccess("admin_username");
include_once "../../includes/admin/head.php";
include_once "../../includes/admin/navbar.php";
include_once "../../includes/admin/sidebar.php";
include_once "../../includes/admin/content.php";


?>
