<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <h4><?= $title ?></h4>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="/admin/san-pham">Sản phẩm</a></li>
                <li class="breadcrumb-item active"><a href="/admin/san-pham/edit/<?= $san_pham['id'] ?>">Sửa</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Sửa sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="ten">Tên sản phẩm:</label>
                                    <input type="text" class="form-control input-default " id="ten" name="ten" value="<?= $san_pham['ten'] ?>" placeholder="Tên sản phẩm" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gia">Giá:</label>
                                    <input type="number" class="form-control" id="gia" name="gia" value="<?= $san_pham['gia'] ?>" placeholder="Nhập giá" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="giam_gia">Giảm giá:</label>
                                    <input type="number" id="giam_gia" name="giam_gia" class="form-control" value="<?= $san_pham['giam_gia'] ?>" placeholder="Nhập giảm giá theo % (1-100)">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="id_thuong_hieu">Thương hiệu:</label>
                                    <select name="id_thuong_hieu" id="id_thuong_hieu" class="form-control" required>
                                        <option>__Chọn Thương hiệu__</option>
                                        <?php foreach ($thuong_hieus as $thuong_hieu): ?>
                                            <option value="<?= $thuong_hieu['id'] ?>" <?php echo $thuong_hieu['id'] == $san_pham['id_thuong_hieu'] ? 'selected' : ''; ?>><?= $thuong_hieu['ten'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="so_luong">Số lượng:</label>
                                    <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?= $san_pham['so_luong'] ?>" placeholder="Nhập số lượng" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="danh_muc">Danh mục:</label>
                                    <select name="danh_muc[]" id="danh_muc" class="js-example-programmatic-multi" multiple="multiple">
                                        <?php foreach ($danh_mucs as $danh_muc): ?>
                                            <option
                                                value="<?= $danh_muc['id'] ?>"
                                                <?php
                                                echo in_array($danh_muc['id'], $danh_muc_san_phams) ? 'selected' : '';
                                                ?>>
                                                <?= $danh_muc['ten'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="card-header">
                                        <h5>Upload ảnh sản phẩm:</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Container hình chữ nhật -->
                                        <div class=" border border-secondary text-white p-4 rounded overflow-auto" style="width: 100%;  min-height: 300px; max-height: 300px;">
                                            <label for="anh_chinh" class="btn btn-dark btn-card">
                                                <span
                                                    class="d-flex flex-column align-items-center justify-content-center "><i class="fa fa-upload"></i>
                                                </span>
                                                Upload
                                            </label>
                                            <input type="file" id="anh_chinh" name="anh_chinh" accept="image/*" style="display: none;">
                                            <div class="d-flex flex-wrap justify-content-center mt-3">
                                                <!-- Ảnh và tên file sẽ được thêm ở đây -->
                                                <img id="previewImage" src="/uploads/<?= $san_pham['anh_chinh'] ?>" class="mt-3 img-thumbnail" style=" display: block; max-height: 100px; max-width: 100px;">
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-center mt-3">
                                                <div id="fileName" class="text-muted mt-3"><?= $san_pham['anh_chinh'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="card-header">
                                        <h5>Upload ảnh mô tả:</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Container upload -->
                                        <div class="border border-secondary text-white p-4 rounded overflow-auto" style="width: 100%; min-height: 300px; max-height: 300px;">
                                            <label for="anh_san_pham" class="btn btn-dark btn-card">
                                                <span
                                                    class="d-flex flex-column align-items-center justify-content-center "><i class="fa fa-upload"></i>
                                                </span>
                                                Upload
                                            </label>
                                            <input type="file" id="anh_san_pham" name="anh_san_pham[]" accept="image/*" style="display: none;" multiple>

                                            <!-- Hiển thị danh sách ảnh -->
                                            <div id="imageList" class="d-flex flex-wrap justify-content-center mt-3 ">
                                                <!-- Ảnh và tên file sẽ được thêm ở đây -->
                                                <?php foreach ($anh_san_phams as $anh): ?>
                                                    <div class="m-2" style="max-width: 150px;">
                                                        <div class="d-flex flex-wrap justify-content-center">
                                                            <img src="/uploads/<?= $anh['url_anh'] ?>" class="img-thumbnail" style=" display: block; max-height: 100px; max-width: 100px;">
                                                        </div>
                                                        <div class="text-center">
                                                            <p class="text-muted small "><?= $anh['url_anh'] ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-center mt-3">
                                                <div id="fileNameAnh" class="text-muted mt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="mo_ta">Mô tả:</label>
                                    <textarea class="summernote" id="mo_ta" name="mo_ta"><?= $san_pham['mo_ta'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="d-flex justify-content-center align-items-center ">
                                    <button type="submit" class="btn btn-primary btn-secondary center">Sửa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("anh_chinh").addEventListener("change", function(event) {
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
    document.getElementById("anh_san_pham").addEventListener("change", function(event) {
        const files = event.target.files; // Lấy danh sách file
        const imageList = document.getElementById("imageList");
        const fileNameAnhElement = document.getElementById("fileNameAnh");
        imageList.innerHTML = ""; // Xóa danh sách ảnh cũ (nếu có)

        Array.from(files).forEach(file => {
            if (file) {
                const reader = new FileReader();

                // Tạo thẻ div chứa ảnh và tên file
                const imageContainer = document.createElement("div");
                imageContainer.classList.add("m-2", "text-center");
                imageContainer.style.maxWidth = "150px";

                const imgElement = document.createElement("img");
                imgElement.classList.add("img-thumbnail");
                imgElement.style.maxWidth = "100px";
                imgElement.style.maxHeight = "100px";

                const fileName = document.createElement("p");
                fileName.classList.add("text-muted", "small");
                fileName.textContent = file.name;

                // Hiển thị ảnh sau khi file được đọc
                reader.onload = function(e) {
                    imgElement.src = e.target.result;
                };
                reader.readAsDataURL(file);

                // Thêm ảnh và tên file vào container
                imageContainer.appendChild(imgElement);
                imageContainer.appendChild(fileName);

                // Thêm container vào danh sách ảnh
                imageList.appendChild(imageContainer);
                fileNameAnhElement.textContent = "";
            } else {
                // Nếu không có tệp nào được chọn
                imageList.innerHTML = "";
                fileNameAnhElement.textContent = "Chưa có tệp nào được chọn";
            }
        });
    });
</script>