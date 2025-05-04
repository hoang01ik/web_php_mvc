<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">


            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    <?php foreach ($sanpham as $product): ?>

                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="/uploads/<?= $product['anh_chinh'] ?>" alt="<?= $product['ten'] ?>">
                                    <div class="product-label">
                                        <?php if ($product['giam_gia']): ?>
                                            <span class="sale">-<?= $product['giam_gia'] ?>%</span>
                                        <?php endif; ?>
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <!-- <p class="product-category">Category</p> -->
                                    <h3 class="product-name"><a href="/sanpham?id=<?= $product['id'] ?>"><?= $product['ten'] ?></a></h3>
                                    <h4 class="product-price">
                                        <?php
                                        $gia_vnd = $product['gia'];
                                        $gia_cu_vnd = ($product['gia'] + $product['giam_gia']);
                                        ?>
                                        <?php echo number_format($gia_vnd, 0, ',', '.'); ?> VND
                                        <?php if ($product['giam_gia'] > 0): ?>
                                            <del class="product-old-price">
                                                <?php echo number_format($gia_cu_vnd, 0, ',', '.'); ?> VND
                                            </del>
                                        <?php endif; ?>
                                    </h4>
                                    <div class="product-rating">
                                        <?php
                                        $rating = 5; // Assume perfect rating for now
                                        for ($i = 1; $i <= 5; $i++):
                                            echo $i <= $rating ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>';
                                        endfor;
                                        ?>
                                    </div>
                                    <div class="product-btns">
                                        <!-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button> -->
                                        <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <a href="/sanpham?id=<?= $product['id'] ?>">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Xem sản phẩm</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <!-- /product -->
                    <div class="clearfix visible-lg visible-md"></div>
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <!-- <span class="store-qty">Showing 20-100 products</span> -->
                    <ul class="store-pagination">
                        <?php if ($currentPage > 1): ?>
                            <li><a href="?page=<?= $currentPage - 1 ?>" ><i class="fa fa-angle-left"></i></a></li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li><a href="?page=<?= $i ?>" class=" <?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a></li>
                        <?php endfor; ?>

                        <?php if ($currentPage < $totalPages): ?>
                            <li><a href="?page=<?= $currentPage + 1 ?>" ><i class="fa fa-angle-right"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
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