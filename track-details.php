<?php
include "template/header.php";
include "page-includes/sidebar.php";
include "page-includes/navbar.php";
?>

<div class="main">
    <?php if (isset($_SESSION['ActivateAlert'])) { ?>
        <div class="alert <?= $_SESSION['AlertColor'] ?> fade show" role="alert">
            <?= $_SESSION['AlertMsg'] ?>

        </div>
    <?php } ?>
    <div class="container-fluid p-3 mb-2 border">

        <?php
        $keyID = $_GET['id'];
        $sql_DisplayTracks = "SELECT tti.*, ts.Status, pl_current.PostName AS CurrentPostName, 
                            CASE WHEN tti.DestinationPostID IS NOT NULL THEN pl_destination.PostName ELSE 'N/A' END AS DestinationPostName
                    FROM tbl_trackinginformation tti
                    INNER JOIN tbl_trackingstatus ts ON tti.TrackingStatusID = ts.TrackingStatusID
                    INNER JOIN tbl_postlocations pl_current ON tti.PostLocationID = pl_current.PostLocationID
                    LEFT JOIN tbl_postlocations pl_destination ON tti.DestinationPostID = pl_destination.PostLocationID
                    WHERE tti.TrackingID = $keyID";

        $result = mysqli_query($conn, $sql_DisplayTracks);

        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="table-responsive">
                    <div class="container-fluid mb-2 d-flex justify-content-between align-items-end">
                        <h6>Tracking Information</h6>
                        <div>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateStatusModal_<?= $row['TrackingID'] ?>">Update Status</button>
                        </div>
                    </div>
                    <?php include 'modals/UpdateTrackingStatus.php'; ?>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="tr-title">Tracking Number:</td>
                                <td><?= $row['TrackingNumber'] ?></td>
                            </tr>

                            <tr>
                                <td class="tr-title">Initial Tracking Date:</td>
                                <td><?= date('m/d/Y H:i', strtotime($row['InitialDate'])) ?></td>
                            </tr>

                            <tr>
                                <td class="tr-title">Tracking Status:</td>
                                <td>
                                    <?= $row['Status'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tr-title">Tracking Location:</td>
                                <td><?= $row['CurrentPostName'] ?></td>
                            </tr>
                            <?php if ($row['TrackingStatusID'] != 1) { ?>
                                <tr>
                                    <td class="tr-title">Destination Post Location:</td>
                                    <td><?= $row['DestinationPostName'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                <div class="container-fluid p-3 mb-2 border">

                    <div class="row">
                        <!-- progress bar here -->
                    </div>

                    <div class="row px-5 circles">
                        <div class="col flex-center">
                            <i class="fa-regular <?php echo ($row['TrackingStatusID'] >= 1) ? 'green' : 'text-muted'; ?> fa-4x fa-circle-check"></i>
                            <p class="m-0">Pending</p>
                        </div>
                        <div class="col flex-center ">
                            <i class="fa-regular <?php echo ($row['TrackingStatusID'] >= 2) ? 'green' : 'text-muted'; ?> fa-4x fa-circle-check"></i>
                            <p class="m-0">Confirmed</p>
                        </div>
                        <div class="col flex-center">
                            <i class="fa-regular <?php echo ($row['TrackingStatusID'] >= 3) ? 'green' : 'text-muted'; ?> fa-4x fa-circle-check"></i>
                            <p class="m-0">In Transit</p>
                        </div>
                        <div class="col flex-center">
                            <i class="fa-regular <?php echo ($row['TrackingStatusID'] >= 4) ? 'green' : 'text-muted'; ?> fa-4x fa-circle-check"></i>
                            <p class="m-0">Out for Delivery</p>
                        </div>
                        <div class="col flex-center">
                            <i class="fa-regular <?php
                                                    $statusClass = 'fa-circle-check text-muted'; // Default class
                                                    if ($row['TrackingStatusID'] == 6) {
                                                        $statusClass = 'fa-circle-xmark text-danger'; // If tracking ID is 6, set class to another-class
                                                    } elseif ($row['TrackingStatusID'] >= 5) {
                                                        $statusClass = 'green fa-circle-check'; // If tracking ID is 5 or greater, set class to green
                                                    }
                                                    echo $statusClass; // Output the class
                                                    ?> fa-4x"></i>
                            <p class="m-0">Delivered</p>
                        </div>
                    </div>
                </div>
                <?php
                // Check if the 'id' parameter is set in the URL
                if (isset($_GET['id'])) {
                    // API URL to fetch order details for the specific ID
                    $apiUrl = 'https://orderingapisample.000webhostapp.com/config/order_api.php?id=' . $_GET['id'];

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
                                if ($order['orderInfo']['OrderID'] == $_GET['id']) {
                ?>
                                    <div class="container-fluid p-3 mb-2 border">
                                        <div class="container-fluid mb-2 d-flex justify-content-between align-items-end">
                                            <h6>Order Information</h6>
                                           
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="tr-title">Order Date:</td>
                                                        <td><?= date('m/d/Y H:i', strtotime($order['orderInfo']['OrderDate'])) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tr-title">Order Number:</td>
                                                        <td><?= 'ORN' . $order['orderInfo']['OrderID'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tr-title">Order Items:</td>
                                                        <td>
                                                            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#seeOrderItemsModal_<?= $order['orderInfo']['OrderID'] ?>">
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

                <?php
                                    break; // Exit the loop after displaying the order details
                                }
                            } // end of foreach loop
                        } // end of else (JSON decoding)
                    } // end of else (data fetched from API)
                } else {
                    echo "Order ID is not provided.";
                } ?>
    </div>
<?php
            }
        } else {
            echo 'no records found';
        } ?>



</div>



<?php
unset($_SESSION['ActivateAlert']);
include "template/footer.php";
?>