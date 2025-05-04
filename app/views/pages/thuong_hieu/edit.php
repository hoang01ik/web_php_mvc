<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <h4><?= $title ?></h4>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="/admin/thuong-hieu">Thương hiệu</a></li>
                <li class="breadcrumb-item active"><a href="/admin/thuong-hieu/edit/<?= $thuong_hieu['id'] ?>">Sửa</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm thương hiệu</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST">
                            <div class="form-group">
                                <label for="ten">Tên thương hiệu:</label>
                                <input type="text" class="form-control input-default " id="ten" name="ten" value="<?= $thuong_hieu['ten'] ?>" placeholder="Tên thương hiệu">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary btn-secondary center">Sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>