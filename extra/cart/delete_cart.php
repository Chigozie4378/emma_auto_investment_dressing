<?php
session_start();
$delete = $_POST["del"];
$b = array("product_name"=>"","unit"=>"","qty"=>"","price"=>"");
$_SESSION["cart"][$delete]=$b; 
?>