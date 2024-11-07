<?php require_once BASE_PATH . "views/inc/header.php" ?>
<!-- Main Content -->
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-lg-12">
            <!-- Post preview -->
            <?php foreach ($posts as $post): ?>
                <div class="card mb-5 shadow-lg border-0">
                    <div class="card-body">
                        <!-- Post Title and Description -->
                        <h2 class="card-title display-5 fw-bold"><?= $post['title']; ?></h2>
                        <h3 class="card-subtitle h5 text-muted mb-3"><?= $post['small_desc']; ?></h3>

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
                                <a href="#!">
                                    <button class="btn btn-outline-success me-2">
                                        <i class="bi bi-hand-thumbs-up"></i> Like
                                    </button>
                                </a>

                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="mt-5">
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
                            <?php if (isset(getsession("userid")["id"])): ?>
                                <h4>Add Your Comment</h4>
                                <!-- Comment Form -->
                                <form action="<?= url('index.php?page=add-comment'); ?>" method="POST">
                                    <div class="form-group mb-3">
                                        <textarea name="comment" class="form-control" rows="3" placeholder="Write your comment..."></textarea>
                                    </div>
                                    <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
                                    <input type="hidden" name="user_id" value="<?= getsession("userid")["id"]; ?>">
                                    <input type="hidden" name="cat_id" value="<?= $post["cat_id"]; ?>">
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                </form>
                            <?php else: ?>
                                <div class="alert alert-info text-center p-4">
                                    <h4 class="mb-3">You need to login to add a comment</h4>
                                    <a href="<?= url("index.php?page=login"); ?>" class="btn btn-primary btn-lg">Login</a>
                                    <p class="mt-3">Don't have an account? <a href="<?= url("index.php?page=sign-up"); ?>">Register here</a>.</p>
                                </div>

                            <?php endif; ?>
                        </div>

                        <!-- Display Comments -->
                        <h4 class="mb-4">All Comments (<?= count($comments); ?>)</h4>
                        <ul class="list-unstyled">
                            <?php if (!empty($comments)): ?>
                                <?php foreach ($comments as $comment): ?>
                                    <li class="media mb-4 p-4 border rounded shadow-sm bg-light">
                                        <!-- Container for comment and delete button -->
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <!-- Comment content on the left -->
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 text-primary"><?= $comment['username']; ?></h5> <!-- Display username -->
                                                <p class="text-muted"><?= $comment['content']; ?></p> <!-- Comment content -->

                                                <small class="text-secondary">
                                                    Commented on <?= date("F d, Y", strtotime($comment['created_at'])); ?>
                                                </small>
                                            </div>

                                            <!-- Delete Button aligned to the right -->
                                            <?php $Useridlogged = getsession("userid")["id"] ?? ""; ?>
                                            <?php if ($Useridlogged == $post["user_id"] || $Useridlogged == $comment["user_id"]) : ?>
                                                <div>
                                                    <a href="<?= url("index.php?page=delete-comment&id=" . $comment["id"] . "&post_id=" . $post["id"]); ?>" class="btn btn-outline-danger">
                                                        <i class="bi bi-trash"></i> Delete Comment
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="text-muted">No comments yet.</li>
                            <?php endif; ?>
                        </ul>
                        <!-- End of Comments Section -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php require_once BASE_PATH . "views/inc/footer.php" ?>