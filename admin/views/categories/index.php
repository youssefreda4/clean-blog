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
                    <h1 class="m-0">All Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= url("index.php?page=home"); ?>">Home</a></li>
                        <li class="breadcrumb-item active">All Categories</li>
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
                            <h3 class="card-title">Categories</h3>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th style="width: 40px">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach (getall('categories') as $category) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $category["name"]; ?></td>
                                            <td>
                                                <a href="<?= url("index.php?page=edit-category&id=" . $category["id"]); ?>" class="btn btn-info ">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= url("index.php?page=delete-category&id=" . $category["id"]); ?>" class="btn btn-danger">Delete</a>
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