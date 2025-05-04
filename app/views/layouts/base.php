<?php

$current_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Lấy đường dẫn từ URL

require_once 'app/models/danh_muc_model.php';
$danhmuc = new Danh_muc_model();
$dsdanhmuc = $danhmuc->findAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>HPI - <?= $title ?></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/assets/default/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/assets/default/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="/assets/default/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/assets/default/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/assets/default/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/assets/default/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header>


        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3 clearfix" style="height: 70px; ">
                        <div class="header-logo" style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%;">
                            <a href="/">
                                <h2 style="color: aliceblue;">Shop HPI</h2>
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="/timkiem" method="get">
                                <select name="danhmuc" class="input-select">
                                    <option value="0">All Categories</option>
                                    <?php foreach ($dsdanhmuc as $dm): ?>
                                        <option value="<?= $dm['id'] ?>"><?= $dm['ten'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input class="input" name="timkiem" placeholder="Search here">
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Cart -->
                            <?php
                            if (!isset($_SESSION['user'])) {
                            ?>
                                <div style=" display:flex; color:aliceblue;">
                                    <a href="/login">
                                        Đăng nhập
                                    </a>/
                                    <a href="/register">Đăng ký</a>
                                </div>
                            <?php } else { ?>
                                <div style=" display:flex; color:aliceblue;">
                                    <a href="/logout">Đăng xuất</a>
                                    <a href="/giohang">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Giỏ hàng</span>
                                        <!-- <div class="qty">3</div> -->
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- /Cart -->
                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <!-- Kiểm tra xem đường dẫn có phải là '/' không -->
                    <li class="<?= ($current_url == '/') ? 'active' : '' ?>"><a href="/">Home</a></li>

                    <!-- Kiểm tra xem đường dẫn có phải là '/sanpham' không (bỏ qua tham số truy vấn) -->
                    <li class="<?= (strpos($current_url, '/sanpham') === 0) ? 'active' : '' ?>">
                        <a href="/sanpham">Sản phẩm</a>
                    </li>

                    <?php if (!empty($_SESSION['thuonghieu'])) {
                        foreach ($_SESSION['thuonghieu'] as $thuonghieu) {
                    ?>
                            <li class="<?= ($current_url == ('/thuonghieu?ten=' . $thuonghieu['ten'])) ? 'active' : '' ?>">
                                <a href="/thuonghieu?ten=<?= $thuonghieu['ten'] ?>"><?= ucfirst($thuonghieu['ten']) ?></a>
                            </li>
                    <?php }
                    } ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <?php if ($flash = getFlash()): ?>
        <div class="alert <?= $flash['type'] === 'success' ? 'alert-success' : 'alert-danger'; ?>">
            <?= htmlspecialchars($flash['message']); ?>
        </div>
    <?php endif; ?>


    <?= $content ?>




    <!-- FOOTER -->
    <footer id="footer">


        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Bản quyền &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> Bảo lưu mọi quyền | Web tạo bởi hoang01ik <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="/assets/default/js/jquery.min.js"></script>
    <script src="/assets/default/js/bootstrap.min.js"></script>
    <script src="/assets/default/js/slick.min.js"></script>
    <script src="/assets/default/js/nouislider.min.js"></script>
    <script src="/assets/default/js/jquery.zoom.min.js"></script>
    <script src="/assets/default/js/main.js"></script>

</body>

</html>