<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <h4>Quản lý sản phẩm</h4>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="/admin/san-pham">Sản phẩm</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/admin/san-pham/add" type="button" class="btn btn-primary">
                        Thêm
                        <span class="btn-icon-right"><i class="fa fa-plus color-info"></i></span>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example" class="display text-dark" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">ID</th>
                                    <th style="width: 10%;">Tên sản phẩm</th>
                                    <th style="width: 10%;">Thương hiệu</th>
                                    <th style="width: 13%;">Giá</th>
                                    <th style="width: 10%;">Giảm giá</th>
                                    <th style="width: 10%;">Số lượng</th>
                                    <th>Mô tả</th>
                                    <th style="width: 10%;">Ngày tạo</th>
                                    <th style="width: 10%;">Ngày cập nhật</th>
                                    <th style="width: 10%;">Ảnh</th>
                                    <th style="width: 10%;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sanphams as $sanpham): ?>
                                    <tr>
                                        <td><?= $sanpham['id'] ?></td>
                                        <td><?= $sanpham['ten'] ?></td>
                                        <td>
                                            <?php
                                            foreach ($thuong_hieus as $thuong_hieu) {
                                                if ($thuong_hieu['id'] == $sanpham['id_thuong_hieu']) {
                                                    echo $thuong_hieu['ten'];
                                                    break;
                                                }
                                            } ?>
                                        </td>
                                        <td><?= number_format($sanpham['gia'], 0, ',', '.') ?> VND</td>
                                        <td><?= $sanpham['giam_gia'] ?></td>
                                        <td><?= $sanpham['so_luong'] ?></td>
                                        <td class="mota"><?= $sanpham['mo_ta'] ?></td>
                                        <td><?= $sanpham['ngay_tao'] ?></td>
                                        <td><?= $sanpham['ngay_cap_nhat'] ?></td>
                                        <td><img src="/uploads/<?= $sanpham['anh_chinh'] ?>" style="max-width: 100%; max-height: 100%;"></td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <div class="d-flex flex-column align-items-center justify-content-center">
                                                    <a href="/admin/san-pham/detail?id=<?= $sanpham['id'] ?>" class="btn btn-outline-dark">Chi tiết</a>
                                                </div>
                                                <span class="d-flex align-items-center justify-content-center ">
                                                    <a href="/admin/san-pham/edit/<?= $sanpham['id'] ?>" class="btn btn-outline-dark" data-toggle="tooltip"
                                                        data-placement="top" title="Sửa"><i
                                                            class="fa fa-pencil color-muted"></i> </a>
                                                    <a href="/admin/san-pham/delete/<?= $sanpham['id'] ?>" class="btn btn-outline-dark" data-toggle="tooltip"
                                                        data-placement="top" title="Xóa" onclick="return confirm('Xóa sản phẩm?')"><i
                                                            class="fa fa-close color-danger"></i></a>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function truncateText(selector, maxLength) {
        const elements = document.querySelectorAll(selector);

        elements.forEach(element => {
            const originalText = element.innerText;

            if (originalText.length > maxLength) {
                const truncatedText = originalText.substring(0, maxLength) + "...";
                element.innerText = truncatedText;
            }
        });
    }
    truncateText('.mota', 50);
</script>