<?php
include_once "../../autoload/loader.php";
$ctr = new StockController();
$product_id = $_POST['product_id'];
$rprice = $_POST['rprice'];
$ctr->updateRprice($rprice, $product_id);
