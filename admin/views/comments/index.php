<?php require_once(ADMIN_PATH . "views/inc/header.php"); ?>
<?php require_once(ADMIN_PATH . "views/inc/nav.php"); ?>
<?php require_once(ADMIN_PATH . "views/inc/aside.php"); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= url("index.php?page=home"); ?>">Home</a></li>
                        <li class="breadcrumb-item active">All Posts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Posts</h3>
                        </div>
                        <?php if (getsession("success")) : ?>
                            <div class="aletr alert-success text-center">
                                <?= flashsession("success"); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (getsession("errors")) : ?>
                            <div class="aletr alert-danger text-center">
                                <?= flashsession("errors"); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (count($comments)): ?>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Content</th>
                                            <th>Created At</th>
                                            <th>Commented By</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($comments as $comment) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $comment["content"]; ?></td>
                                                <td><?= $comment["created_at"]; ?></td>
                                                <td><?= $comment["username"]; ?></td>
                                                <td>
                                                    <a href="<?= url("index.php?page=delete-comment&id=" . $comment["id"]); ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <h3 class="text-center my-3 text-info">No Posts Found</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(ADMIN_PATH . "views/inc/footer.php"); ?>
