<?php require_once('includes/header.php')  ?>

<?php require_once('includes/nav.php')  ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                    <?php 
                           display_message();
                           login_validation();
                    ?>
                        <h2 class="text-center mt-2">Login form</h2>
                        <hr>
                    </div>
                    <div class="card-body">
                    <form method="POST">
                        <input type="email" name="UEmail" placeholder="Email" class="form-control py-2 mb-2">
                        <input type="password" name="UPass" placeholder="password" class="form-control py-2 mb-2">
                        <button class="btn btn-dark float-right">Login</button>
                    </div>
                    <div class="card-footer">
                    <input type="checkbox" name="remember"><span>Remember Me</span>
                        <a href="Forget.php" class="float-right">Froget Password</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('includes/footer.php')  ?>
