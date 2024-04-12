<?php
include "template/header.php";
include "page-includes/sidebar.php";
include "page-includes/navbar.php";

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    // API URL to fetch order details for the specific ID
    $apiUrl = 'http://localhost/tracking_order/config/ralfh_api.php?id=' . $_GET['id'];

    // Fetch data from the API
    $data = file_get_contents($apiUrl);

    // Check if data was fetched successfully
    if ($data === false) {
        // Handle error
        echo "Failed to fetch data from the API.";
    } else {
        // Convert JSON data to PHP array
        $orderDetails = json_decode($data, true);

        // Check if JSON decoding was successful
        if ($orderDetails === null) {
            // Handle JSON decoding error
            echo "Failed to decode JSON data.";
        } else {
            // Display order details
            foreach ($orderDetails as $orderId => $order) {
                // Check if the current order's ID matches the provided ID
                if ($order['order_id'] == $_GET['id']) {
?>
                    <div class="main">
                        <?php if (isset($_SESSION['ActivateAlert'])) { ?>
                            <div class="alert <?= $_SESSION['AlertColor'] ?> fade show" role="alert">
                                <?= $_SESSION['AlertMsg'] ?>
                            </div>
                        <?php } ?>

                        <div class="container-fluid p-3 mb-2 border">
                            <div class="container-fluid mb-2 d-flex justify-content-between align-items-end">
                                <h6>Order Information</h6>
                                <div>
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#trackOrderModal_<?= $order['order_id'] ?>">Track Order</button>
                                    <?php include 'modals/trackOrderModal.php'; ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="tr-title">Order Date:</td>
                                            <td><?= date('m/d/Y H:i', strtotime($order['order_date'])) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="tr-title">Order Number:</td>
                                            <td><?= 'ORN' . $order['order_id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="tr-title">Order Items:</td>
                                            <td>
                                                <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#seeOrderItemsModal_<?= $order['order_id'] ?>">
                                                    View Order Items
                                                </button>
                                                <?php include 'modals/seeOrderItemsModal.php'; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tr-title">Total Amount of Order:</td>
                                            <td>₱<?= number_format($totalAmount, 2) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container-fluid p-3 mb-2 border">
                            <div class="table-responsive">
                                <h6>Customer Information</h6>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="tr-title">Customer Name:</td>
                                            <td><?= $order['customer']['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="tr-title">Delivery Address:</td>
                                            <td><?= $order['delivery_address'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="tr-title">Contact Number:</td>
                                            <td><?= $order['customer']['contact_information'] ?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<?php
                    break; // Exit the loop after displaying the order details
                }
            } // end of foreach loop
        } // end of else (JSON decoding)
    } // end of else (data fetched from API)
} else {
    echo "Order ID is not provided.";
}

unset($_SESSION['ActivateAlert']);
include "template/footer.php";
?>
