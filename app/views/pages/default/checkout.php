<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<div class="section">
    <!-- container -->
    <form action="/giohang?action=submit" method="post">
        <div class="container">
            <h2 class="text-center">Giỏ hàng của bạn</h2>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($sanphams)) {
                        $stt = 1;
                        foreach ($sanphams as $sanpham) { ?>
                            <tr>

                                <td><?= $stt++ ?></td>
                                <td><?= $sanpham['ten'] ?></td>
                                <td><img src="/uploads/<?= $sanpham['anh_chinh'] ?>" width="50"></td>
                                <td><?php echo number_format($sanpham['gia'], 0, ',', '.'); ?> VND</td>
                                <td><input type="number" value="<?= $_SESSION['card'][$sanpham['id']] ?>" name="soluong[<?= $sanpham['id'] ?>]"></td>
                                <td><?php echo number_format(($sanpham['gia'] * $_SESSION['card'][$sanpham['id']]), 0, ',', '.'); ?> VND</td>
                                <td><a href="/giohang?action=delete&id=<?= $sanpham['id'] ?>" class="btn btn-danger btn-sm">Xóa</a></td>

                            </tr>
                    <?php }
                    } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5" class="text-right">Tổng tiền</th>
                        <th>
                            <?php

                            $stt = 1;
                            $tongtien = 0;
                            if (isset($sanphams)) {
                                foreach ($sanphams as $sanpham) {
                                    $tongtien += ($sanpham['gia'] * $_SESSION['card'][$sanpham['id']]);
                                }
                            } ?>
                            <?php echo number_format($tongtien, 0, ',', '.'); ?> VND
                        </th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <input type="submit" name="update_click" value="Cập nhật" class="btn btn-danger btn-sm">

            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">ĐỊA CHỈ THANH TOÁN</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Họ tên">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="tel" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <!-- /Billing Details -->
                    <!-- Order notes -->
                    <div class="order-notes">
                        <textarea class="input" placeholder="Ghi chú" name="note"></textarea>
                    </div>
                    <!-- /Order notes -->
                    <input type="submit" class="primary-btn order-submit" name="dathang" value="Đặt hàng">
                </div>
            </div>
            <!-- /row -->
        </div>
    </form>
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