<?php require_once('includes/header.php')  ?>
<?php require_once('includes/nav.php')  ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                        <h2 class="text-center mt-2">Reset Password</h2>
                        <hr>
                    </div>
                    <div class="card-body">
                        <input type="password" name="reset-pass" placeholder="password" class="form-control py-2 mb-2">
                        <input type="password" name="reset-c-pass" placeholder="confirm pass" class="form-control py-2 mb-2">
                    </div>
                    <div class="card-footer">
                    <button class="btn btn-danger float-left">Cancel</button>
                    <button class="btn btn-success float-right">Send Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('includes/footer.php')  ?>
