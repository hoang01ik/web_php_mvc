<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <h4>Sửa tài khoản</h4>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="/admin/tai-khoan">Tài khoản</a></li>
                <li class="breadcrumb-item "><a href="/admin/tai-khoan/edit/<?= $tai_khoan['id'] ?>">Sửa</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Sửa tài khoản</h5>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="basic-form">
                            <div class="form-row text-dark">
                                <div class="form-group col-md-6">
                                    <label for="tai-khoan">Tài khoản: </label>
                                    <input type="text" class="form-control" disabled id="tai-khoan" name="tai-khoan" value="<?= $tai_khoan['tai_khoan'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mat_khau">Mật khẩu: </label>
                                    <input type="text" class="form-control" id="mat_khau" name="mat_khau" value="<?= $tai_khoan['mat_khau'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ten">Tên: </label>
                                    <input type="text" class="form-control" id="ten" name="ten" value="<?= $tai_khoan['ten'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email: </label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $tai_khoan['email'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="so_dien_thoai">Số điện thoại: </label>
                                    <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="<?= $tai_khoan['so_dien_thoai'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dia_chi">Địa chỉ: </label>
                                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?= $tai_khoan['dia_chi'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="quyen" id="quyen" class="form-control">
                                        <option value="admin" <?= $tai_khoan['quyen'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="user" <?= $tai_khoan['quyen'] == 'user' ? 'selected' : '' ?>>User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>