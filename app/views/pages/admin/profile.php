<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Profile</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item active"><a href="/admin/profile">Profile</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <div class="profile-view text-dark">
                            <div class="text-center">
                                <img src="/assets/admin/images/avatar/1.png" alt="Profile Picture" class="profile-pic">
                                <h4 class="mb-3"><?= $_SESSION['admin']['ten'] ?></h4>
                                <p class="text-muted">Ngày tạo: <?= $_SESSION['admin']['ngay_tao'] ?></p>
                            </div>
                            <div class="mt-4">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Tài khoản</label>
                                    <input type="text" class="form-control" id="username" value="<?= $_SESSION['admin']['tai_khoan'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <a href="" data-toggle="modal" data-target="#doimatkhau">Đổi mật khẩu</a>
                                    </div>
                                    <input type="password" class="form-control" id="password" value="<?= $_SESSION['admin']['mat_khau'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="fullname" value="<?= $_SESSION['admin']['ten'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?= $_SESSION['admin']['email'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="phone" value="<?= $_SESSION['admin']['so_dien_thoai'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <textarea class="form-control" id="address" rows="2" readonly><?= $_SESSION['admin']['dia_chi'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Quyền</label>
                                    <input type="text" class="form-control" id="role" value="<?= $_SESSION['admin']['quyen'] ?>" readonly>
                                </div>
                            </div>
                            <div class="text-center">
                                <a data-toggle="modal" data-target="#edit-profile" class="btn btn-primary mt-3 text-white">Chỉnh sửa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="doimatkhau">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Đổi mật khẩu</h5>
                    <button type="button" class="close"
                        data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <div class="form-group">
                            <label for="matkhau">Mật khẩu cũ:</label>
                            <input type="password" id="matkhau" name="matkhau" class="form-control" placeholder="Nhập mật khẩu cũ">
                        </div>
                        <div class="form-group">
                            <label for="matkhaumoi">Mật khẩu mới:</label>
                            <input type="password" id="matkhaumoi" name="matkhaumoi" class="form-control" placeholder="Nhập mật khẩu mới">
                        </div>
                        <div class="form-group">
                            <label for="matkhaumoia">Nhập lại mật khẩu mới:</label>
                            <input type="password" id="matkhaumoia" name="matkhaumoia" class="form-control" placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Hủy</button>
                    <button type="submit" name="doimatkhau" class="btn btn-primary">Đổi mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-profile">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa hồ sơ</h5>
                    <button type="button" class="close"
                        data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <div class="form-group">
                            <label for="taikhoan">Tài khoản:</label>
                            <input type="text" id="taikhoan" readonly name="taikhoan" class="form-control" value="<?= $_SESSION['admin']['tai_khoan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="matkhau">Mật khẩu:</label>
                            <input type="password" id="matkhau" name="matkhau" readonly class="form-control" value="<?= $_SESSION['admin']['mat_khau'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="ten">Tên:</label>
                            <input type="text" id="ten" name="ten" class="form-control" value="<?= $_SESSION['admin']['ten'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?= $_SESSION['admin']['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="<?= $_SESSION['admin']['so_dien_thoai'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="diachi">Địa chỉ:</label>
                            <textarea class="form-control" id="diachi" name="diachi" rows="2"><?= $_SESSION['admin']['dia_chi'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Quyền</label>
                            <input type="text" class="form-control" id="role" value="<?= $_SESSION['admin']['quyen'] ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Hủy</button>
                    <button type="submit" name="editprofile" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>