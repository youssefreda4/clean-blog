<?php require_once BASE_PATH . "views/inc/header.php" ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-lg-12">
            <?php if (getsession("success")) : ?>
                <div class="alert alert-success text-center">
                    <?= flashsession("success"); ?>
                </div>
            <?php endif; ?>

            <?php if (getsession("errors")) : ?>
                <?php foreach (flashsession("errors") as $error) : ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= $error; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form action="<?= url("index.php?page=handle-signup") ?>" method="POST" class="row g-4">


                <div class="col-md-6">
                    <label for="first-name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" />
                </div>

                <div class="col-md-6">
                    <label for="last-name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                </div>


                <div class="col-md-6">
                    <label for="password" class="form-label">Enter Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Repeat Password</label>
                    <input type="password" class="form-control" id="password" name="repeatedpassword" placeholder="Password" />
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                </div>
            </form>
            <div class="col-md-12 mt-3 mb-3 text-center">
                <a href="<?= url("index.php?page=login");?>">Already have an account?</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer-->
<?php require_once BASE_PATH . "views/inc/footer.php" ?>