<?php require_once BASE_PATH . "views/inc/header.php" ?>
<!-- Main Content -->
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-lg-12">
            <!-- Post edit form -->
            <?php if (getsession("success")) : ?>
                <div class="alert alert-success text-center">
                    <?= flashsession("success") ?>
                </div>
            <?php endif; ?>

            <?php if (getsession("errors")) : ?>
                <?php foreach (flashsession("errors") as $error) : ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= $error; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php foreach ($posts as $post): ?>
                <form action="<?= url("index.php?page=update-post"); ?>" method="POST" enctype="multipart/form-data">
                    <div class="card mb-5 shadow-lg border-0">
                        <div class="card-body">
                            <!-- Post Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Post Title</label>
                                <input type="text" id="title" name="title" class="form-control" value="<?= $post['title']; ?>">
                                <input type="hidden" name="id" value="<?= $post["id"] ?>">
                                <input type="hidden" name="user_id" value="<?= getsession("userid")["id"]; ?>">

                            </div>


                            <!-- Post Description -->
                            <div class="mb-3">
                                <label for="small_desc" class="form-label">Post Description</label>
                                <textarea id="small_desc" name="small_desc" class="form-control" rows="3"><?= $post['small_desc']; ?></textarea>
                            </div>

                            <!-- Post Content -->
                            <div class="mb-3">
                                <label for="small_desc" class="form-label">Post Content</label>
                                <textarea id="small_desc" name="content" class="form-control" rows="3"><?= $post['content']; ?></textarea>
                            </div>

                            <!-- Current Image -->
                            <?php if ($post['image'] != NULL) : ?>
                                <div class="mb-3">
                                    <label class="form-label">Current Image</label><br>
                                    <img src="<?= url('database/uploads/img/' . $post['image']); ?>" class="img-fluid mb-4">
                                </div>
                            <?php endif; ?>


                            <!-- Upload New Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload New Image (Optional)</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>

                            <!-- Categories Select -->
                            <div class="col-md-12 mb-3">
                                <label for="programming_language" class="form-label">Categories</label>
                                <select name="category" class="form-select">
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?= $category['id']; ?>" <?= $category['id'] == $post['category_id'] ? 'selected' : ''; ?>>
                                            <?= $category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="text-danger"><!-- Error message for category --></span>
                            </div>
                            <!-- Meta Info -->
                            <p class="card-text">
                                Post created on <?= date("F d, Y", strtotime($post['created_at'])); ?>
                            </p>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Footer -->
<?php require_once BASE_PATH . "views/inc/footer.php" ?>