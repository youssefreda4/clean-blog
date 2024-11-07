<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL; ?>assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= BASE_URL; ?>assets/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?= url("index.php?page=home"); ?>">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('index.php?page=home'); ?>">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('index.php?page=about'); ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('index.php?page=contact'); ?>">Contact</a>
                    </li>
                    <?php if (!isset(getsession("userid")["id"])): ?>
                        <li class="nav-item">
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('index.php?page=sign-up'); ?>">Sign-up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('index.php?page=login'); ?>">Login</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('index.php?page=posts'); ?>">Posts</a>
                        </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Activity
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item py-3" href="<?= url('index.php?page=profile'); ?>">
                                    <i class="bi bi-pencil-square me-2"></i> Profile
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>
                            
                            <li>
                                <a class="dropdown-item py-3" href="<?= url('index.php?page=add-post'); ?>">
                                    <i class="bi bi-pencil-square me-2"></i> Add Post
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>

                            <li>

                                <a class="dropdown-item py-3" href="<?= url('index.php?page=logout'); ?>">
                                    <i class="bi bi-person-circle me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>

                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1><?= $page_name; ?></h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>