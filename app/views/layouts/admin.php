<?php
// Lấy URL hiện tại
$currentUrl = $_SERVER['REQUEST_URI'];

// Kiểm tra URL để xác định trạng thái 'active'
$isActiveDetail = strpos($currentUrl, '/admin/san-pham/detail') !== false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/admin/images/favicon.png">
    <link rel="stylesheet" href="/assets/admin/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/admin/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="/assets/admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="/assets/admin/vendor/summernote/summernote.css" rel="stylesheet">
    <link href="/assets/admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/admin/vendor/select2/css/select2.min.css">
    <link href="/assets/admin/vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <link href="/assets/admin/css/style.css" rel="stylesheet">
    <script src="/assets/admin/vendor/jquery/jquery.min.js"></script>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/admin" class="brand-logo">
                <h2 style="color:aliceblue;">HPI</h2>
                <!-- <img class="logo-abbr" src="/assets/admin/images/logo.png" alt="">
                <img class="logo-compact" src="/assets/admin/images/logo-text.png" alt="">
                <img class="brand-title" src="/assets/admin/images/logo-text.png" alt=""> -->
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <!-- <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li> -->
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/assets/admin/app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="/logout" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li><a href="/admin/dashboard"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a></li>
                    <li class="nav-label">Quản lý</li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-layout-25"></i><span class="nav-text">Quản lý tài khoản</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/admin/tai-khoan">Tài khoản</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Quản lý thương hiệu</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/admin/thuong-hieu">Thương hiệu</a></li>
                            <li><a href="/admin/thuong-hieu/add">Thêm</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-layout-25"></i><span class="nav-text">Quản lý danh mục</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/admin/danh-muc">Danh mục</a></li>
                            <li><a href="/admin/danh-muc/add">Thêm</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Quản lý sản phẩm</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/admin/san-pham">Sản phẩm</a></li>
                            <li><a href="/admin/san-pham/add">Thêm</a></li>

                            <li><a href="/admin/san-pham/detail" class="<?= $isActiveDetail ? 'active' : '' ?>">Chi tiết sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Quản lý đơn hàng</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/admin/don-hang">Đơn hàng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <?php if ($flash = getFlash()): ?>
                <div class="alert alert-<?= $flash['type'] ?> alert-dismissible fade show">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                    <strong><?= $flash['type'] ?>!</strong><?= htmlspecialchars($flash['message']); ?>
                </div>
            <?php endif; ?>

            <?= $content ?>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->


    <script src="/assets/admin/vendor/global/global.min.js"></script>
    <script src="/assets/admin/js/quixnav-init.js"></script>
    <script src="/assets/admin/js/custom.min.js"></script>

    <script src="/assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/js/plugins-init/datatables.init.js"></script>
    <!-- Summernote -->
    <script src="/assets/admin/vendor/summernote/js/summernote.min.js"></script>
    <!-- Summernote init -->
    <script src="/assets/admin/js/plugins-init/summernote-init.js"></script>
    <script src="/assets/admin/vendor/select2/js/select2.full.min.js"></script>
    <script src="/assets/admin/js/plugins-init/select2-init.js"></script>

    <script src="/assets/admin/vendor/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="/assets/admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="/assets/admin/js/plugins-init/jquery.validate-init.js"></script>

    <!-- Form step init -->
    <script src="/assets/admin/js/plugins-init/jquery-steps-init.js"></script>




</body>

</html>

<!-- <header class="py-3">
        <nav>
            <a href="/admin/danh-muc">Quản lý danh mục</a>
        </nav>
    </header>
     -->