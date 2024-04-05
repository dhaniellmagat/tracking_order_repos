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
    </div>
    <div class="container-fluid p-3 mb-2 border">

        <div class="table-responsive">
            <h6>Order Information</h6>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="tr-title">Order Date:</td>
                        <td>Lorem Ipsum</td>
                    </tr>
                    <tr>
                        <td class="tr-title">Order Number:</td>
                        <td>Lorem Ipsum</td>
                    </tr>
                    <tr>
                        <td class="tr-title">Order Items:</td>
                        <td>
                            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#seeOrderItemsModal">
                                View Order Items
                            </button>
                            <?php include 'modals/seeOrderItemsModal.php'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tr-title">Total Amount of Order:</td>
                        <td>Lorem Ipsum</td>
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
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td class="tr-title">Delivery Address:</td>
                        <td>Lorem Ipsum</td>
                    </tr>
                    <tr>
                        <td class="tr-title">Contact Number:</td>
                        <td>Lorem Ipsum</td>
                    </tr>
                    <tr>
                        <td class="tr-title">Email Address:</td>
                        <td>Lorem Ipsum</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>



<?php
unset($_SESSION['ActivateAlert']);
include "template/footer.php";
?>