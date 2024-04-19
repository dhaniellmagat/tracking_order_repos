<?php
// Include necessary files
include 'customer-template/header.php';
include 'customer-template/navbar.php';

// Check if order ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize input to prevent SQL injection
    $order_id = $_GET['id'];

    // Query to fetch order details and associated order items
    $query = "SELECT 
                orders.order_date,
                product.name,
                order_item.quantity_ordered,
                product.price
                FROM 
                orders
                INNER JOIN 
                order_item ON orders.order_id = order_item.order_id
                INNER JOIN 
                product ON order_item.product_id = product.product_id
                WHERE 
                orders.order_id = $order_id";

    $result = $conn->query($query);

    // Check if the query executed successfully
    if ($result) {
?>
        <div class="container-fluid py-5 bg-light">
            <h1 class="text-center">Order Details for <?='OR'.$order_id ?> </h1>
            <div class="container col-lg-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
            // Iterate over each row of the result set
            while ($row = $result->fetch_assoc()) {
?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['quantity_ordered'] ?></td>
                                <td><?= $row['price'] ?></td>
                            </tr>
<?php
            }
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php
    } else {
        // Query failed
        echo "Failed to retrieve order details.";
    }
} else {
    // Order ID not provided
    echo "Order ID not provided.";
}

// Include footer
include 'customer-template/footer.php';
?>
