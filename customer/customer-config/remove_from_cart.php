<?php
session_start();

// Check if product ID is provided
if(isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if the product is in the cart
    if(isset($_SESSION['cart'][$product_id])) {
        // Decrease the quantity by 1
        $_SESSION['cart'][$product_id] -= 1;
        // If the quantity becomes 0, remove the product from the cart
        if($_SESSION['cart'][$product_id] <= 0) {
            unset($_SESSION['cart'][$product_id]);
        }
        // Optionally, you can update other cart-related data here
        echo 'success'; // Return success message
    } else {
        echo 'error'; // Product not found in cart
    }
} else {
    echo 'error'; // Product ID not provided
}
?>
