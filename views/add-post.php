<?php require_once BASE_PATH . "views/inc/header.php" ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <form action="<?= url("index.php?page=store-post"); ?>" method="POST" enctype="multipart/form-data" class="row g-3 p-4">

                <!-- Success Message -->
                <?php if (getsession("errors")) : ?>
                    <?php foreach (flashsession("errors") as $error) : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $error; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (getsession("success")) : ?>
                    <div class="alert alert-success text-center">
                        <?= flashsession("success") ?>
                    </div>
                    <?php unset($_SESSION["success"]); ?>
                <?php endif; ?>

                <!-- Product Name Input -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control">
                    <input type="hidden" name="user_id" value="<?= getsession("userid")["id"]; ?>">
                    <span class="text-danger"><!-- Error message for name --></span>
                </div>

                <!-- Product Price Input -->
                <div class="col-md-6 mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" name="content" class="form-control">
                    <span class="text-danger"><!-- Error message for price --></span>
                </div>

                <!-- Small desc -->
                <div class="col-md-12 mb-3">
                    <label for="content" class="form-label">Small Description</label>
                    <input type="text" name="small_desc" class="form-control">
                    <span class="text-danger"><!-- Error message for price --></span>
                </div>

                

                <!-- Product Image Input -->
                <div class="col-12 mb-3">
                    <label for="image" class="form-label">Post Image</label>
                    <input type="file" name="image" class="form-control">
                    <span class="text-danger"><!-- Error message for image --></span>
                </div>

                <!-- Submit Button -->
                <div class="col-12 mb-3">
                    <input type="submit" class="btn btn-primary w-100" value="Submit">
                </div>

            </form>
        </div>
    </div>
</div>
<?php require_once BASE_PATH . "views/inc/footer.php" ?>