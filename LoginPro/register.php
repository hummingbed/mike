<?php require_once('includes/header.php')  ?>

<?php require_once('includes/nav.php')  ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                   
                    <div class="card-title">
                        <h2 class="text-center mt-2">registration form</h2>
                        <hr>
                    </div>
                    <form action="" method="post">
                        <div class="card-body">
                        <?php  user_validation(); ?>
                            <input type="text" name="FirstName" placeholder="Firstname" class="form-control py-2 mb-2">
                            <input type="text" name="LastName" placeholder="Lastname" class="form-control py-2 mb-2">
                            <input type="text" name="UserName" placeholder="Username" class="form-control py-2 mb-2">
                            <input type="email" name="Email" placeholder="Email" class="form-control py-2 mb-2" require>
                            <input type="password" name="pass" placeholder="password" class="form-control py-2 mb-2">
                            <input type="password" name="cpass" placeholder="Confirm password" class="form-control py-2 mb-2">
                            <button class="btn btn-success float-right">Register Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('includes/footer.php')  ?>
