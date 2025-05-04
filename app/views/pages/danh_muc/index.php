<!-- <head>
    <link href="/assets/admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
</head> -->
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <h4>Quản lý danh mục</h4>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="/admin/danh-muc">Danh mục</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/admin/danh-muc/add" type="button" class="btn btn-primary">
                        Thêm
                        <span class="btn-icon-right"><i class="fa fa-plus color-info"></i></span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Mô tả</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($danh_mucs as $danh_muc): ?>
                                    <tr>
                                        <td><?= $danh_muc['id'] ?></td>
                                        <td><?= $danh_muc['ten'] ?></td>
                                        <td><?= $danh_muc['mo_ta'] ?></td>
                                        <td>
                                            <span>
                                                <a href="/admin/danh-muc/edit/<?= $danh_muc['id'] ?>" class="mr-4" data-toggle="tooltip"
                                                    data-placement="top" title="Sửa"><i
                                                        class="fa fa-pencil color-muted"></i> </a>
                                                <a href="/admin/danh-muc/delete/<?= $danh_muc['id'] ?>" data-toggle="tooltip"
                                                    data-placement="top" title="Xóa" onclick="return confirm('Xóa danh mục?')"><i
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