<?php
include 'customer-template/header.php';
include 'customer-template/navbar.php';
?>


<div class="container-fluid py-5 bg-light d-flex justify-content-center">
    <div class="col-lg-6 col-md-12">
        <form action="customer-config/login.php" method="post">
            <h3>Login</h3>
            <label for="">username</label>
            <input type="text" name="username" class="form-control mb-3">
            <label for="">password</label>
            <input type="text" name="password" class="form-control mb-3">
            <div class="row px-0 mx-0">
                <button class="btn btn-info my-1 btn-block" type="submit" name="btn-login">Login</button>
            </div>
        </form>
    </div>

</div>

<?php
include 'customer-template/footer.php'; ?>