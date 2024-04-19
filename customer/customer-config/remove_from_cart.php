<?php
session_start();

// Check if the product ID is provided and valid
if(isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Check if the product exists in the cart
    if(isset($_SESSION['cart'][$productId])) {
        // Decrement the quantity of the product by one
        $_SESSION['cart'][$productId]--;
        
        // If the quantity becomes zero, remove the product from the cart completely
        if($_SESSION['cart'][$productId] <= 0) {
            unset($_SESSION['cart'][$productId]);
        }
        
        // Respond with a success message
        echo json_encode(['success' => true, 'message' => 'One quantity of the product removed from cart successfully']);
        exit;
    } else {
        // If the product doesn't exist in the cart, respond with an error message
        echo json_encode(['success' => false, 'message' => 'Product not found in cart']);
        exit;
    }
} else {
    // If the product ID is not provided or invalid, respond with an error message
    echo json_encode(['success' => false, 'message' => 'Invalid product ID']);
    exit;
}
