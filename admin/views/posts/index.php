<?php require_once(ADMIN_PATH . "views/inc/header.php"); ?>
<?php require_once(ADMIN_PATH . "views/inc/nav.php"); ?>
<?php require_once(ADMIN_PATH . "views/inc/aside.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Posts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= url("index.php?page=home"); ?>">Home</a></li>
                        <li class="breadcrumb-item active">All Posts</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
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

                        <?php if (count($posts)): ?>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>title</th>
                                            <th>content</th>
                                            <th>small_desc</th>
                                            <th>created_at</th>
                                            <th>user_id </th>
                                            <th>category_id </th>
                                            <th>image</th>
                                            <th>Photo</th>
                                            <th style="width: 40px">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $post["title"]; ?></td>
                                                <td><?= $post["content"]; ?></td>
                                                <td><?= $post["small_desc"]; ?></td>
                                                <td><?= $post["created_at"]; ?></td>
                                                <td><?= $post["user_id"]; ?></td>
                                                <td><?= $post["category_id"]; ?></td>
                                                <td><?= $post["image"]; ?></td>

                                                <td>
                                                    <?php if ($post['image'] != NULL) : ?>
                                                        <img src="<?= url('../database/uploads/img/' . $post['image']); ?>" class="img-fluid mb-4">
                                                    <?php endif; ?>
                                                </td>

                                                <td class="text-center">
                                                    <a href="<?= url("index.php?page=delete-post&id=" . $post["id"]); ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <h3 class="text-center botder p-3my-3 text-info">No Posts Found</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once(ADMIN_PATH . "views/inc/footer.php"); ?>