<?php require_once BASE_PATH . "views/inc/header.php" ?>


<div class="container mt-5">
    <!-- Profile Section -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 shadow">
                <div class="card-body text-center">
                    <!-- Profile Image -->
                    <img src="<?= url('assets/img/c0749b7cc401421662ae901ec8f9f660.jpg'); ?>" alt="Profile Picture"
                        class="rounded-circle img-fluid mb-3" width="150" height="150">

                    <!-- Profile Info -->
                    <h3 class="card-title"><?= $user["username"]; ?></h3>
                    <p class="text-muted">Type: <?= $user['type'] == 'admin' ? 'Admin' : 'User'; ?></p>

                    <!-- Edit Profile Button -->
                    <a href="#!" class="btn btn-outline-primary">
                        <i class="bi bi-pencil-square"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Posts Section -->
        <div class="col-lg-8">
            <h3 class="mb-4">Your Posts</h3>
            <?php if (getsession("success")) : ?>
                <div class="alert alert-success text-center">
                    <?= flashsession("success"); ?>
                </div>
            <?php endif; ?>

            <?php if (getsession("errors")) : ?>
                <div class="alert alert-danger text-center">
                    <?= flashsession("errors"); ?>
                </div>
            <?php endif; ?>
            <!-- Loop through user posts -->
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="card mb-4 shadow-lg border-0">
                        <div class="card-body">
                            <!-- Post Title and Description -->
                            <a href="<?= url("index.php?page=post&id=" . $post['id']);?>"  class="text-decoration-none text-dark">
                                <h2 class="card-title display-5 fw-bold"><?= $post['title']; ?></h2>
                                <h3 class="card-subtitle h5 text-muted mb-3"><?= $post['small_desc']; ?></h3>
                            </a>

                            <!-- Image -->
                            <?php if ($post['image'] != NULL) : ?>
                                <img src="<?= url('database/uploads/img/' . $post['image']); ?>" class="img-fluid mb-4">
                            <?php endif; ?>
                            <!-- Meta Info and Edit Button on the Same Line -->
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text mb-0">
                                    Category
                                    <a href="#!" class="text-primary fw-bold"><?= $post["name"]; ?></a>
                                    on <?= date("F d, Y", strtotime($post['created_at'])); ?>
                                </p>

                                <!-- Edit Button -->
                                <a href="<?= url("index.php?page=edit-post&id=" . $post["id"]); ?>" class="btn btn-outline-primary">
                                    <i class="bi bi-pencil-square"></i> Edit Post
                                </a>

                                <!-- delete Button -->
                                <a href="<?= url("index.php?page=delete-post&id=" . $post["id"]); ?>" class="btn btn-outline-danger">
                                    <i class="bi bi-trash"></i> Delete Post
                                </a>

                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted">You have not posted anything yet.</p>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php require_once BASE_PATH . "views/inc/footer.php" ?>