<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <h4><?= $title ?></h4>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="/admin/danh-muc">Danh mục</a></li>
                <li class="breadcrumb-item active"><a href="/admin/danh-muc/edit/<?= $danh_muc['id'] ?>">Sửa</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm danh mục</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST">
                            <div class="form-group">
                                <label for="ten">Tên danh mục:</label>
                                <input type="text" class="form-control input-default " id="ten" name="ten" value="<?= $danh_muc['ten'] ?>" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả:</label>
                                <textarea class="summernote" id="mo_ta" name="mo_ta"><?= $danh_muc['mo_ta'] ?></textarea>
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