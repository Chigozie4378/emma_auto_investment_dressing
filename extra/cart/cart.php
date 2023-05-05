<?php
session_start();
// include "../core/init.php";
$productname= $_POST["productname"];
$quantity = $_POST["quantity"];
$price= $_POST["price"];
$qty= $_POST["qty_db"];

if (isset($_SESSION["cart"])){
    $max  = sizeof($_SESSION["cart"]);
    $check_available = 0;
    $check_available = checkDuplicateCart($productname);
    $available_qty=0;
    $check_the_qty = 0;

    if ($check_available==0){
        $available_qty = checkQty();
        if ($available_qty >= $quantity){
            $b = array("productname"=>$productname,"quantity"=>$quantity,"price"=>$price);
            array_push($_SESSION["cart"],$b);
        }else{
            echo "Entered quantity not available";
        }

    }else{
        $av_qty = 0;
        $exist_qty = checkQtyCart($productname);
        $exist_qty = $exist_qty+$quantity;
        $av_qty = checkQty();
        if ($av_qty>=$exist_qty){
            $product_no_session = addToQtyInCart($productname);
            $b = array("productname"=>$productname,"quantity"=>$exist_qty,"price"=>$price);
            $_SESSION["cart"][$product_no_session]=$b; 
        }else{
            echo "Entered quantity not available";
        }
    }
}else{
    $available_qty = checkQty();
    if ($available_qty=$quantity){
        $_SESSION["cart"]=array(array("productname"=>$productname,"quantity"=>$quantity,"price"=>$price));
    }else{
        echo "entered quantity not available";
    }
}

function checkQty(){
    $qty= $_POST["qty_db"];
    return $qty;

}
function checkDuplicateCart($productname){
     $found = 0;
    $max = sizeof($_SESSION['cart']);
    for ($i=0; $i < $max; $i++) { 
        if (isset($_SESSION['cart'][$i])){
            $productname_session = "";

            foreach ($_SESSION["cart"][$i] as $key => $val) {
                if ($key=="productname"){
                    $productname_session = $val;
                }
            }
            if ($productname_session == $productname){
                $found = $found+1;
            }
        }
    }
    return $found; 
}
function checkQtyCart($productname){
    $qty_found = 0;
    $quantity_session=0;
    $max = sizeof($_SESSION['cart']);
    for ($i=0; $i < $max; $i++) { 
        $productname_session = "";
        if (isset($_SESSION['cart'][$i])){     
            foreach ($_SESSION["cart"][$i] as $key => $val) {
                if ($key=="productname"){
                    $productname_session = $val;
                }elseif ($key=="quantity"){
                    $quantity_session = $val;
                }
            }
            if ($productname_session == $productname){
                $qty_found = $quantity_session;
            }
        }
    }
    return $qty_found; 
}
function addToQtyInCart($productname){
    $record_no = 0;
   $max = sizeof($_SESSION['cart']);
   for ($i=0; $i < $max; $i++) { 
       if (isset($_SESSION['cart'][$i])){
           $productname_session = "";

           foreach ($_SESSION["cart"][$i] as $key => $val) {
               if ($key=="productname"){
                   $productname_session = $val;
               }
           }
           if ($productname_session == $productname){
               $record_no = $i;
           }
       }
   }
   return $record_no; 
}
?>