<?php
include_once "../../autoload/loader.php";
$ctr = new StockController();
$product_id = $_POST['product_id'];
$wprice = $_POST['wprice'];
$ctr->updateWprice($wprice, $product_id);