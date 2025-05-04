<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header text-center">
                <h2>HÓA ĐƠN</h2>
            </div>
            <div class="card-body">
                <h4>Thông tin khách hàng</h4>
                <div class="mb-3">
                    <strong>Tên người đặt:</strong> <span id="customerName"><?= $donhang['name'] ?></span>
                </div>
                <div class="mb-3">
                    <strong>Địa chỉ:</strong> <span id="customerAddress"><?= $donhang['dia_chi_giao'] ?></span>
                </div>
                <div class="mb-3">
                    <strong>Số điện thoại:</strong> <span id="customerPhone"><?= $donhang['tel'] ?></span>
                </div>
                <h4>Danh sách sản phẩm</h4>
                <table class="table table-bordered text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá (VNĐ)</th>
                            <th>Thành tiền (VNĐ)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1;
                        foreach ($donhang['san_pham'] as $sanpham) { ?>
                            <tr>
                                <td><?= $stt++ ?></td>
                                <td><?= $sanpham['ten_san_pham'] ?></td>
                                <td><?= $sanpham['so_luong'] ?></td>
                                <td><?php echo number_format($sanpham['gia_san_pham'], 0, ',', '.'); ?></td>
                                <td><?php echo number_format($sanpham['gia_san_pham'] * $sanpham['so_luong'], 0, ',', '.'); ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr class="table-secondary">
                            <td colspan="4" class="text-end"><strong>Tổng tiền:</strong></td>
                            <td><strong><?php echo number_format($donhang['tong_tien'], 0, ',', '.'); ?> VND</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer text-center">
                <p>Cảm ơn quý khách đã mua hàng!</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>