<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview ">
                        <img src="/uploads/<?= $sanpham['anh_chinh'] ?>" alt="">
                    </div>
                    <?php foreach ($anhs as $anh): ?>
                        <div class="product-preview">
                            <img src="/uploads/<?= $anh['url_anh'] ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="/uploads/<?= $sanpham['anh_chinh'] ?>" alt="">
                    </div>
                    <?php foreach ($anhs as $anh): ?>
                        <div class="product-preview">
                            <img src="/uploads/<?= $anh['url_anh'] ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- /Product thumb imgs -->
            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?= $sanpham['ten'] ?></h2>
                    <!-- <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Review(s) | Add your review</a>
                    </div> -->
                    <div>
                        <h3 class="product-price">
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
                        </h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <div>
                        <div id="mo_ta_short">
                            <main><?= substr($sanpham['mo_ta'], 0, 200) . '...' ?></main>
                            <button id="btn_show_more" style="border: none;" onclick="showMore()">Xem thêm</button> <!-- Nút Xem thêm -->
                        </div> <!-- Hiển thị phần mô tả ngắn -->
                        <div id="mo_ta_full" style="display: none;">
                            <div>
                                <?= $sanpham['mo_ta'] ?>
                            </div>
                        </div> <!-- Mô tả đầy đủ, ẩn đi -->
                    </div>

                    <div class="add-to-cart">
                        <p>Có sẵn: <?= $sanpham['so_luong'] ?></p>
                        <form action="/giohang?action=add" method="post">
                            <div class="qty-label">
                                Số lượng:
                                <div class="input-number">
                                    <input type="number" value="1" name="soluong[<?= $sanpham['id'] ?>]">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </form>
                    </div>
                    <ul class="product-links">
                        <li>Danh mục:</li>
                        <?php foreach ($dm_sp as $dm): ?>
                            <li><a href="#"><?= $dm['ten']; ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- /Product details -->
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

<script>
    function showMore() {
        // Ẩn phần mô tả ngắn và hiển thị phần mô tả đầy đủ
        document.getElementById('mo_ta_short').style.display = 'none'; // Ẩn mô tả ngắn
        document.getElementById('mo_ta_full').style.display = 'block'; // Hiển thị mô tả đầy đủ
        document.getElementById('btn_show_more').style.display = 'none'; // Ẩn nút "Xem thêm"
    }
</script>