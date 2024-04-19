<?php
session_start();

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$productId])) {
        // If the product is in the cart, increment its quantity
        $_SESSION['cart'][$productId]++;
    } else {
        // If the product is not in the cart, add it with quantity 1
        $_SESSION['cart'][$productId] = 1;
    }

    echo 'success';
} else {
    echo 'error';
}
?>
