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

                    $sql_LookOrderNum = "SELECT * FROM orders ORDER BY order_date DESC";
                    $result = mysqli_query($conn, $sql_LookOrderNum);

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row of data
                        while ($orderInfo = mysqli_fetch_assoc($result)) {

                    ?>
                            <tr>
                                <td><?= ++$RowCount ?></td>
                                <td><?= date('m/d/Y H:i', strtotime($orderInfo['order_date'])) ?></td>
                                <td><?= 'ORN' . $orderInfo['order_id'] ?></td>
                                <td><a type="button" href="order-details.php?id=<?= $orderInfo['order_id'] ?>" class="btn btn-info text-white">View</a></td>
                            </tr>
                    <?php }
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