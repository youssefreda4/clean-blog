        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <?php
            /*
            <a href="index3.html" class="brand-link">
                <img src="<?php echo BASE_URL . "assets/dist/" ?>img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            */
            ?>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo BASE_URL . "assets/dist/" ?>img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <?php $username = getrow("users", getsession("userid")["id"]);  ?>
                        <a href="#" class="d-block"><?= $username["username"]; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link <?= activeadminlink(["categories", "add-category", "edit-category"]); ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?php echo  url("index.php?page=categories"); ?>" class="nav-link <?= activeadminlink(["categories"]); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo  url("index.php?page=add-category"); ?>" class="nav-link <?= activeadminlink(["add-category"]); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo  url("index.php?page=users"); ?>" class="nav-link <?= activeadminlink(["users"]); ?>">
                                <i class="nav-icon fas fa-user-plus"></i>

                                <p>
                                    Users
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo  url("index.php?page=messages"); ?>" class="nav-link <?= activeadminlink(["messages"]); ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Messages
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo  url("index.php?page=posts"); ?>" class="nav-link <?= activeadminlink(["posts"]); ?>">
                                <i class="nav-icon fas fa-copy"></i>

                                <p>
                                    Posts
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo  url("index.php?page=comments"); ?>" class="nav-link <?= activeadminlink(["comments"]); ?>">
                                <i class="nav-icon fas fa-comments"></i>

                                <p>
                                    Comments
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>