<?php
include "template/header.php";
include "page-includes/sidebar.php";
include "page-includes/navbar.php";

?>

<!-- Page content -->
<div class="main">
    <div class="container-fluid bg-light p-3 border">
        <h3 class="text-center">Ordering System</h3>
       
    </div>
    <br>
    <div class="container-fluid bg-light p-3 border">
        <div class="row">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date & Time</th>
                        <th>Order Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $RowCount = 0;
                    try {
                        require_once 'config/fetch_order_api.php';

                        // Check if data was fetched successfully
                        if ($dataArray === false) {
                            throw new Exception("Failed to fetch data from the API.");
                        } else {
                            // Loop through each order
                            foreach ($dataArray as $orderId => $orderInfo) {
                    ?>
                                <tr>
                                    <td><?= ++$RowCount ?></td>
                                    <td><?= date('m/d/Y H:i', strtotime($orderInfo['orderInfo']['OrderDate'])) ?></td>
                                    <td><?= 'ORN' .$orderInfo['orderInfo']['OrderID'] ?></td>
                                    <td><a type="button" href="order-details.php?id=<?= $orderInfo['orderInfo']['OrderID'] ?>" class="btn btn-info text-white">View</a></td>
                                </tr>
                    <?php }
                        }
                    } catch (Exception $e) {
                        echo '<tr><td colspan="4">' . $e->getMessage() . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php
include "template/footer.php";
?>
