<?php
include_once "../../autoload/loader.php";
$ctr = new StockController();
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$ctr->updateQty($quantity, $product_id);