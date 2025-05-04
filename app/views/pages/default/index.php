<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm mới</h3>

                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php foreach ($sanphamnew as $sanpham): ?>
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="/uploads/<?php echo $sanpham['anh_chinh']; ?>" alt="">
                                            <div class="product-label">
                                                <?php if ($sanpham['giam_gia'] > 0): ?>
                                                    <span class="sale">-<?php echo $sanpham['giam_gia']; ?>%</span>
                                                <?php endif; ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?php echo htmlspecialchars($sanpham['ten_thuong_hieu']); ?></p>
                                            <h3 class="product-name"><a href="#"><?php echo htmlspecialchars($sanpham['ten']); ?></a></h3>
                                            <h4 class="product-price">
                                                <?php
                                                $gia_vnd = $sanpham['gia'];
                                                $gia_cu_vnd = ($sanpham['gia'] + $sanpham['giam_gia']);
                                                ?>
                                                <?php echo number_format($gia_vnd, 0, ',', '.'); ?> VND
                                                <?php if ($sanpham['giam_gia'] > 0): ?>
                                                    <del class="product-old-price">
                                                        <?php echo number_format($gia_cu_vnd, 0, ',', '.'); ?> VND
                                                    </del>
                                                <?php endif; ?>
                                            </h4>
                                            <div class="product-rating">
                                                <!-- Fake rating for display purpose -->
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <!-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button> -->
                                                <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                                                <!-- <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button> -->
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="/sanpham?id=<?= $sanpham['id'] ?>">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Xem sản phẩm</button>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                <?php endforeach; ?>


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm</h3>

                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">

                                <?php foreach ($sanphams as $sanpham): ?>
                                    <!-- product -->
                                    <div class="col-md-4 col-xs-6">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="/uploads/<?php echo htmlspecialchars($sanpham['anh_chinh']); ?>" alt="<?php echo htmlspecialchars($sanpham['ten']); ?>">
                                                <div class="product-label">
                                                    <?php if ($sanpham['giam_gia'] > 0): ?>
                                                        <span class="sale">-<?php echo htmlspecialchars($sanpham['giam_gia']); ?>%</span>
                                                    <?php endif; ?>
                                                    <!-- <span class="new">NEW</span> -->
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo htmlspecialchars($sanpham['ten_thuong_hieu']); ?></p>
                                                <h3 class="product-name"><a href="/product/<?php echo $sanpham['id']; ?>"><?php echo htmlspecialchars($sanpham['ten']); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?php
                                                    $gia_vnd = $sanpham['gia'];
                                                    $gia_cu_vnd = ($sanpham['gia'] + $sanpham['giam_gia']);
                                                    ?>
                                                    <?php echo number_format($gia_vnd, 0, ',', '.'); ?> VND
                                                    <?php if ($sanpham['giam_gia'] > 0): ?>
                                                        <del class="product-old-price">
                                                            <?php echo number_format($gia_cu_vnd, 0, ',', '.'); ?> VND
                                                        </del>
                                                    <?php endif; ?>
                                                </h4>
                                                <div class="product-rating">
                                                    <!-- Fake rating for display purpose -->
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <!-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button> -->
                                                    <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                                                    <!-- <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button> -->
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a href="/sanpham?id=<?= $sanpham['id'] ?>">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Xem sản phẩm</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                <?php endforeach; ?>


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->