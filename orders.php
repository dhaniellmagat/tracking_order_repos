<?php
include "template/header.php";
include "page-includes/sidebar.php";
include "page-includes/navbar.php";

?>

<!-- Page content -->
<div class="main">
    <div class="container-fluid bg-light p-3 border">
        <h3 class="text-center">Ordering System</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-sm-12 col-md-10">
                <form method="GET" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Enter Order Number" aria-label="Enter Order Number" aria-describedby="button-search">
                        <button class="btn btn-outline-secondary" type="submit" id="button-search" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
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
                
                            <tr>
                                <td>1</td>
                                <td>11/11/11</td>
                                <td>OR01</td>
                                <td><a type="button" href="order-details.php" class="btn btn-info text-white">View</a></td>
                            </tr>
                   
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php
include "template/footer.php";
?>