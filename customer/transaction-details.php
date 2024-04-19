<?php
// Include necessary files
include 'customer-template/header.php';
include 'customer-template/navbar.php';

// Check if order ID is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize input to prevent SQL injection
    $order_id = $_GET['id'];

    // Query to fetch order details and associated order items
    $query = "SELECT o.*, c.*, p.name AS product_name, oi.*, p.*
              FROM orders o
              INNER JOIN customers c ON o.customer_id = c.customer_id
              INNER JOIN order_item oi ON o.order_id = oi.order_id
              INNER JOIN product p ON oi.product_id = p.product_id
              WHERE o.order_id = $order_id";

    $result = $conn->query($query);

    // Check if the query executed successfully
    if ($result) {
?>
        <div class="container-fluid py-5 bg-light">
            <h1 class="text-center">Order Details for <?= 'OR' . $order_id ?> </h1>
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
                            $totalAmount = 0;
                            // Iterate over each row of the result set
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $row['product_name'] ?></td>
                                    <td><?= $row['quantity_ordered'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                </tr>
                            <?php
                            $totalAmount += $row['price'] * $row['quantity_ordered'];
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        // Now, let's fetch payment details outside the loop
        $sql_getAmount = "SELECT * FROM payment_method WHERE order_id = $order_id";
        $paymentResult = $conn->query($sql_getAmount);

        // Check if the query executed successfully
        if ($paymentResult && $paymentResult->num_rows > 0) {
            $paymentRow = $paymentResult->fetch_assoc();
        ?>
            <div class="container-fluid py-5 bg-light">
                <div class="container col-lg-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-end">Total Amount:</td>
                                    <td><?= $totalAmount ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end">Payment Type/Method:</td>
                                    <td><?= $paymentRow['Type'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

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
