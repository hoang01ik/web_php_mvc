<!-- <head>
    <link href="/assets/admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
</head> -->
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <h4>Quản lý tài khoản</h4>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="/admin/tai-khoan">Tài khoản</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display text-dark" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tài khoản</th>
                                    <th>Mật khẩu</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Quyền</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tai_khoans as $tai_khoan): ?>
                                    <tr>
                                        <td><?= $tai_khoan['id'] ?></td>
                                        <td><?= $tai_khoan['tai_khoan'] ?></td>
                                        <td><?= $tai_khoan['mat_khau'] ?></td>
                                        <td><?= $tai_khoan['ten'] ?></td>
                                        <td><?= $tai_khoan['email'] ?></td>
                                        <td><?= $tai_khoan['so_dien_thoai'] ?></td>
                                        <td><?= $tai_khoan['dia_chi'] ?></td>
                                        <td><?= $tai_khoan['quyen'] ?></td>
                                        <td><?= $tai_khoan['ngay_tao'] ?></td>
                                        <td><?= $tai_khoan['ngay_cap_nhat'] ?></td>
                                        <td>
                                            <span>
                                                <a href="/admin/tai-khoan/edit/<?= $tai_khoan['id'] ?>" class="mr-4" data-toggle="tooltip"
                                                    data-placement="top" title="Sửa"><i
                                                        class="fa fa-pencil color-muted"></i> </a>
                                                <a href="/admin/tai-khoan/delete/<?= $tai_khoan['id'] ?>" data-toggle="tooltip"
                                                    data-placement="top" title="Xóa" onclick="return confirm('Xóa tài khoản?')"><i
                                                        class="fa fa-close color-danger"></i></a>
                                            </span>
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