<!-- <head>
    <link href="/assets/admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
</head> -->
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <h4>Quản lý đơn hàng</h4>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="/admin/don-hang">Đơn hàng</a></li>
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
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên người nhận</th>
                                    <th>Địa chỉ</th>
                                    <th>Điện thoại</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($donhangs as $donhang):
                                ?>
                                <tr>
                                    <td><?= $donhang['id'] ?></td>
                                    <td><?= $donhang['name'] ?></td>
                                    <td><?= $donhang['dia_chi_giao'] ?></td>
                                    <td><?= $donhang['tel'] ?></td>
                                    <td><?= $donhang['tong_tien'] ?></td>
                                    <td><?= $donhang['ngay_dat_hang'] ?></td>
                                    <td><a href="?id=<?= $donhang['id'] ?>" class="btn btn-dark">In</a></td>
                                </tr>
                                <?php
                                endforeach; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>