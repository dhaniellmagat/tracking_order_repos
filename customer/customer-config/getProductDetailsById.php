<?php

function getProductDetailsById($product_id, $conn) {
    // Query to retrieve product details based on the provided product ID
    $sql = "SELECT * FROM product WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // Fetch the product details
        $product_details = $result->fetch_assoc();
        return $product_details;
    } else {
        return false; // Return null if no product found with the provided ID
    }
}

?>
