<?php
session_start();

if (isset($_POST['quantity']) && isset($_POST['productname']) && isset($_POST['price'])) {
    $quantity = $_POST['quantity'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];

    // Loop through the cart and update the quantity for the specified product
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i]['productname'] == $productname) {
            $_SESSION['cart'][$i]['quantity'] = $quantity;
            break;
        }
    }

    // Calculate the new total and update the session variable
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['quantity'] * $item['price'];
    }
    $_SESSION['total'] = $total;

    echo 'success';
} else {
    echo 'error';
}
?>
