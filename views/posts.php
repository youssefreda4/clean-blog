<?php require_once BASE_PATH . "views/inc/header.php" ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5 shadow-lg border-0 d-flex flex-row justify-content-center align-items-center" style="min-height:100px;">
                <?php foreach ($categories as $category): ?>
                    <a href="<?= url("index.php?page=posts&category=" . $category["id"]); ?>" class="p-2 mx-2 <?= activelink($active_id, $category["id"]); ?>"><?= $category["name"]; ?></a>
                <?php endforeach; ?>
            </div>

            <!-- Post preview -->
            <?php if (count($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="card mb-5 shadow-lg border-0">
                        <div class="card-body">
                            <!-- Post Title and Description -->
                            <a href="<?= url("index.php?page=post&id=" . $post['id']); ?>" class="text-decoration-none text-dark">
                                <h2 class="card-title display-5 fw-bold"><?= $post['title']; ?></h2>
                                <h3 class="card-subtitle h5 text-muted mb-3"><?= $post['small_desc']; ?></h3>
                            </a>

                            <!-- Image -->
                            <?php if ($post['image'] != NULL) : ?>
                                <img src="<?= url('database/uploads/img/' . $post['image']); ?>" class="img-fluid mb-4">
                            <?php endif; ?>

                            <!-- Meta Info -->
                            <p class="card-text">
                                Category
                                <a href="#!" class="text-primary fw-bold"><?= $post["name"]; ?></a>
                                on <?= date("F d, Y", strtotime($post['created_at'])); ?>
                            </p>

                            <!-- Like and Comment Buttons -->
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <a href="!#">
                                        <button class="btn btn-outline-success me-2">
                                            <i class="bi bi-hand-thumbs-up"></i> Like
                                        </button>
                                    </a>
                                    <a href="<?= url("index.php?page=comment&id=" . $post['id']); ?>">
                                        <button class="btn btn-outline-secondary">
                                            <i class="bi bi-chat-left-text"></i> Comment
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h3 class="text-center botder p-3my-3 text-info">No Posts Found</h3>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Footer-->
<?php require_once BASE_PATH . "views/inc/footer.php" ?>