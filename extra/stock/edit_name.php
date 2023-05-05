<?php
include_once "../../autoload/loader.php";
$ctr = new StockController();
$product_id = $_POST['product_id'];
$new_name = $_POST['new_name'];
// $old_name = $_POST['old_name'];
// $target_dir = "../../stocks/";
// rename("$target_dir.$old_name","$target_dir.$new_name");
$ctr->updateName($new_name, $product_id);
