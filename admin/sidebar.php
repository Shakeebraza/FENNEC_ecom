<nav id="coolAdminNavbar" class="navbar navbar-light bg-light d-lg-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://via.placeholder.com/40" alt="Cool Admin Logo" width="40" height="40">
            <span>Fennec</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#coolAdminOffcanvas" aria-controls="coolAdminOffcanvas" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="coolAdminOffcanvas" aria-labelledby="coolAdminOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="coolAdminOffcanvasLabel">fennec</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $urlval?>admin/index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="nav-item has-sub">
                        <a class="nav-link js-arrow" href="#"><i class="fas fa-users"></i> Users</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="<?php echo $urlval?>admin/user/index.php">All Users</a>
                            </li>
                            <li>
                                <a href="<?php echo $urlval?>admin/user/adduser.php">Add Users</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $urlval?>admin/menu/index.php"><i class="fas fa-bars"></i>Menus</a>
                    </li>
                    <li class="nav-item has-sub">
                        <a class="nav-link js-arrow" href="#"><i class="fas fa-copy"></i>Pages</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="<?php echo $urlval?>admin/page/index.php">All Page</a>
                            </li>
                            <li>
                                <a href="<?php echo $urlval?>admin/page/addpage.php">Add Page</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $urlval?>admin/box/index.php"><i class="fas fa-desktop"></i> Box</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="<?php echo $urlval?>admin/asset/images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?php echo $urlval?>admin/index.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-users"></i>Users</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?php echo $urlval?>admin/user/index.php">All Users</a>
                        </li>
                        <li>
                            <a href="<?php echo $urlval?>admin/user/adduser.php">Add users</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $urlval?>admin/menu/index.php">
                        <i class="fas fa-bars"></i>Menus</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?php echo $urlval?>admin/page/index.php">All Page</a>
                        </li>
                        <li>
                            <a href="<?php echo $urlval?>admin/page/addpage.php">Add Pages</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo $urlval?>admin/box/index.php">
                        <i class="fas fa-desktop"></i>Box</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
