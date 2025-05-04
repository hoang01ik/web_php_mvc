<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <h4><?= $title ?></h4>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="/admin/san-pham">Sản phẩm</a></li>
                <li class="breadcrumb-item active"><a href="/admin/san-pham/detail ?>">Chi tiết sản phẩm</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php if (isset($sanpham)) { ?>
                    <div class="card-header">
                        <h4 class="card-title">Chi tiết sản phẩm </h4>
                        <h5>Id: <?= $sanpham['id'] ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-center rounded-lg">
                                                    <div class="d-flex flex-wrap justify-content-center mt-3">
                                                        <img class="img-thumbnail" src="/uploads/<?= $sanpham['anh_chinh'] ?>">
                                                    </div>
                                                    <div class="">
                                                        <div class="text-muted  mt-3"><?= $sanpham['anh_chinh'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-3 text-muted">
                                                <div class="card-body">
                                                    <h5>Tên: <?= $sanpham['ten'] ?> </h5>
                                                    <h5>Giá: <?= number_format($sanpham['gia'], 0, ',', '.') ?> VND </h5>
                                                    <h5>Giảm giá: <?= number_format($sanpham['giam_gia'], 0, ',', '.') ?>% </h5>
                                                    <h5>Số lượng: <?= $sanpham['so_luong'] ?> </h5>
                                                    <h5>
                                                        Thương hiệu:
                                                        <?php foreach ($thuong_hieus as $thuong_hieu) {
                                                            if ($thuong_hieu['id'] == $sanpham['id_thuong_hieu']) {
                                                                echo $thuong_hieu['ten'];
                                                                break;
                                                            }
                                                        } ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-3">
                                                <div class="card border">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Danh Mục</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="basic-form">
                                                            <form method="POST">
                                                                <div class="form-group overflow-auto" style="max-height: 200px;">
                                                                    <?php foreach ($danh_mucs as $danh_muc): ?>
                                                                        <div class="form-check mb-2">
                                                                            <input type="checkbox" class="form-check-input" id="danhmuc" name="danhmuc[]" value="<?= $danh_muc['id'] ?>" <?= in_array($danh_muc['id'], $danh_muc_san_phams) ? 'checked' : '' ?>>
                                                                            <label class="form-check-label" for="danhmuc"><?= $danh_muc['ten'] ?></label>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" name="updatedanhmuc" class="btn btn-outline-dark mr-3">Lưu</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div style=" min-height: 300px; max-height: 300px;">
                                                    <label class="ml-2">
                                                        <h5>Mô tả:</h5>
                                                    </label>
                                                    <div class="overflow-auto border d-flex flex-column text-muted p-3 rounded" style=" min-height: 250px; max-height: 250px;">
                                                        <?= $sanpham['mo_ta'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <form method="post">
                                        <div class="d-flex justify-content-between mb-2">
                                            <div>
                                                <!-- Nút Chọn tất cả -->
                                                <!-- <button type="button" id="selectAll" class="btn btn-outline-dark mr-3">Chọn tất cả</button> -->
                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#add" data-id="<?= $anh['id'] ?>">
                                                    Thêm <i class="fa fa-plus ml-2"></i>
                                                </button>
                                            </div>
                                            <!-- Nút Xóa -->
                                            <button type="submit" name="deleteAnhs" id="deleteBtn" class="btn btn-danger" style="display: none;">Xóa</button>

                                        </div>
                                        <div class="table-responsive " style="max-height: 700px; overflow-y: auto; position: relative; ">
                                            <table class="table table-bordered table-responsive-sm" style="border-collapse: separate; border-spacing: 0;  font-weight: bold; color: #333;">
                                                <thead style="position: sticky; top: 0; background: #fff; z-index: 10;">
                                                    <tr>
                                                        <th width="5"><input type="checkbox" id="selectAll"></th>
                                                        <th style="width: 15%;">ID</th>
                                                        <th style="width: 60%;">Ảnh</th>
                                                        <th style="width: 10%;">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <style>
                                                    tbody tr:hover {
                                                        background-color: #f5f5f5;
                                                        /* Màu nền khi hover */
                                                        cursor: pointer;
                                                        /* Con trỏ thay đổi khi hover */
                                                    }
                                                </style>
                                                <tbody>
                                                    <?php foreach ($anh_san_phams as $anh): ?>
                                                        <tr class="clickable-row">
                                                            <td><input type="checkbox" class="selectRow" id="anh" name="anh[]" value="<?= $anh['id'] ?>"></td>
                                                            <td><?= $anh['id'] ?></td>
                                                            <td>
                                                                <img class="img-thumbnail" style="max-height: 100px;" src="/uploads/<?= $anh['url_anh'] ?>" alt="">
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#uploadanh" data-id="<?= $anh['id'] ?>">
                                                                    <i class="fa fa-pencil color-muted"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php  } else { ?>
                    <div class="card-header">
                        <h4 class="card-title">Chi tiết sản phẩm</h4>
                        <form method="get">
                            <label for="id">Nhập Id:</label>
                            <input type="number" id="id" name="id">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </form>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-sm" id="uploadanh" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <input type="hidden" id="anhId" name="anhId" value="">
                    <div class=" border border-secondary text-white p-4 rounded overflow-auto" style="width: 100%;  min-height: 300px; max-height: 300px;">

                        <label for="anhmoi" class="btn btn-outline-dark">
                            <span
                                class="d-flex flex-column align-items-center justify-content-center "><i class="fa fa-upload"></i>
                            </span>
                            Upload
                        </label>
                        <input type="file" id="anhmoi" name="anhmoi" accept="image/*" style="display: none;" required>
                        <div class="d-flex flex-wrap justify-content-center mt-3">
                            <!-- Ảnh và tên file sẽ được thêm ở đây -->
                            <img id="previewImage" src="" alt="Preview" class="mt-3 img-thumbnail" style=" display: none;">
                        </div>
                        <div class="d-flex flex-wrap justify-content-center ml-3">
                            <div id="fileName" class="text-muted mt-3">Chưa có tệp nào được chọn</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="uploadanh" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade bd-example-modal-sm" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class=" border border-secondary text-white p-4 rounded overflow-auto" style="width: 100%;  min-height: 300px; max-height: 300px;">
                        <label for="anhnew" class="btn btn-outline-dark">
                            <span
                                class="d-flex flex-column align-items-center justify-content-center "><i class="fa fa-upload"></i>
                            </span>
                            Upload
                        </label>
                        <input type="file" id="anhnew" name="anhnew" accept="image/*" style="display: none;" required>
                        <div class="d-flex flex-wrap justify-content-center mt-3">
                            <!-- Ảnh và tên file sẽ được thêm ở đây -->
                            <img id="previewImage2" src="" alt="Preview" class="mt-3 img-thumbnail" style=" display: none;">
                        </div>
                        <div class="d-flex flex-wrap justify-content-center ml-3">
                            <div id="fileName2" class="text-muted mt-3">Chưa có tệp nào được chọn</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="addanh" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    document.getElementById("anhmoi").addEventListener("change", function(event) {
        const file = event.target.files[0]; // Lấy file được chọn
        const fileNameElement = document.getElementById("fileName");
        const previewImage = document.getElementById("previewImage");

        if (file) {
            // Hiển thị tên file
            fileNameElement.textContent = `Tệp: ${file.name}`;

            // Hiển thị ảnh preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
                previewImage.style.maxWidth = "100px";
                previewImage.style.maxHeight = "100px";
            };
            reader.readAsDataURL(file);
        } else {
            // Nếu không có tệp nào được chọn
            fileNameElement.textContent = "Chưa có tệp nào được chọn";
            previewImage.style.display = "none";
        }
    });
    document.getElementById("anhnew").addEventListener("change", function(event) {
        const file = event.target.files[0]; // Lấy file được chọn
        const fileNameElement = document.getElementById("fileName2");
        const previewImage = document.getElementById("previewImage2");

        if (file) {
            // Hiển thị tên file
            fileNameElement.textContent = `Tệp: ${file.name}`;

            // Hiển thị ảnh preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
                previewImage.style.maxWidth = "100px";
                previewImage.style.maxHeight = "100px";
            };
            reader.readAsDataURL(file);
        } else {
            // Nếu không có tệp nào được chọn
            fileNameElement.textContent = "Chưa có tệp nào được chọn";
            previewImage.style.display = "none";
        }
    });

    document.getElementById('selectAll').addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.selectRow');
        var isChecked = Array.from(checkboxes).every(checkbox => checkbox.checked); // Kiểm tra xem tất cả đã được chọn chưa

        // Nếu tất cả checkbox đã được chọn, bỏ chọn tất cả, ngược lại chọn tất cả
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = !isChecked;
        });

        toggleDeleteButton(); // Kiểm tra nút Xóa
    });
    document.querySelectorAll('.clickable-row').forEach(row => {
        console.log(document.querySelectorAll('.clickable-row'))
        row.addEventListener('click', function() {
            if (event.target.closest('button') || event.target.closest('.fa-pencil')) {
                return; // Nếu là nút, không thực hiện thay đổi checkbox
            }

            // Nếu không phải là nút, thực hiện thay đổi checkbox
            const checkbox = this.querySelector('input[type="checkbox"]');
            if (checkbox) {
                checkbox.checked = !checkbox.checked;
                toggleDeleteButton(); // Gọi hàm tùy chỉnh của bạn nếu cần
            }
        });
    });
    $(document).ready(function() {
        $('#uploadanh').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Sửa ảnh id: ' + recipient)
            modal.find('.modal-body input[name="anhId"]').val(recipient)
        })
    });



    // Hàm kiểm tra và hiển thị nút Xóa nếu có ít nhất một checkbox được chọn
    function toggleDeleteButton() {
        var selectedCheckboxes = document.querySelectorAll('.selectRow:checked').length;
        var deleteBtn = document.getElementById('deleteBtn');
        if (selectedCheckboxes > 0) {
            deleteBtn.style.display = 'inline-block'; // Hiển thị nút Xóa
        } else {
            deleteBtn.style.display = 'none'; // Ẩn nút Xóa
        }
    }
</script>