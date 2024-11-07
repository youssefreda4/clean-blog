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
                    <h1 class="m-0">Starter Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= url("index.php?page=home"); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">User Registrations</span>
                            <span class="info-box-number"><?= count(getall("users")); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Messages -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Messages</span>
                            <span class="info-box-number"><?= count(getall('messages')); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Posts -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-copy"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Posts</span>
                            <span class="info-box-number"><?= count(getall("posts")); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Comments -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-comments"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Comments</span>
                            <span class="info-box-number"><?= count(getall("comments")); ?></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- This Month's Stats Section -->
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="text-center">This Month's Stats (<?= date("F") ?>)</h3>
            </div>

            <!-- User Registrations This Month -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-user-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">User registrations this month</span>
                        <span class="info-box-number"><?= countthismonth("users"); ?></span>
                    </div>
                </div>
            </div>

            <!-- Messages This Month -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Messages this month</span>
                        <span class="info-box-number"><?= countthismonth("messages"); ?></span>
                    </div>
                </div>
            </div>

            <!-- Posts This Month -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Posts this month</span>
                        <span class="info-box-number"><?= countthismonth("posts"); ?></span>
                    </div>
                </div>
            </div>

            <!-- Comments This Month -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Comments this month</span>
                        <span class="info-box-number"><?= countthismonth("comments"); ?></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<?php require_once(ADMIN_PATH . "views/inc/footer.php"); ?>