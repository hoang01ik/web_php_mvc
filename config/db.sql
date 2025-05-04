-- Tao database
CREATE DATABASE IF NOT EXISTS cuahang0;

USE cuahang0;

-- 1. Bang danh_muc
CREATE TABLE danh_muc (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(255) NOT NULL UNIQUE,
    mo_ta TEXT NULL
);

CREATE TABLE thuong_hieu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(255) NOT NULL UNIQUE
);

-- 2. Bang san_pham
CREATE TABLE san_pham (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(255) NOT NULL UNIQUE,
    id_thuong_hieu INT NOT NULL,
    gia DECIMAL(10, 2) NOT NULL,
    giam_gia DECIMAL(5, 2) NULL,
    so_luong INT NOT NULL,
    mo_ta TEXT NULL,
    anh_chinh VARCHAR(255) NULL,
    ngay_tao DATETIME DEFAULT CURRENT_TIMESTAMP,
    ngay_cap_nhat DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_thuong_hieu) REFERENCES thuong_hieu(id)
);

CREATE TABLE danh_muc_san_pham (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_san_pham INT NOT NULL,
    id_danh_muc INT NOT NULL,
    FOREIGN KEY (id_san_pham) REFERENCES san_pham(id) ON DELETE CASCADE,
    FOREIGN KEY (id_danh_muc) REFERENCES danh_muc(id) ON DELETE CASCADE
);

-- 3. Bang anh_san_pham
CREATE TABLE anh_san_pham (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_san_pham INT NOT NULL,
    url_anh VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_san_pham) REFERENCES san_pham(id) ON DELETE CASCADE
);

-- 4. Bang khach_hang
CREATE TABLE tai_khoan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tai_khoan VARCHAR(255) NOT NULL UNIQUE,
    mat_khau VARCHAR(255) NOT NULL,
    ten VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    so_dien_thoai VARCHAR(15) NULL,
    dia_chi TEXT NULL,
    quyen ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    ngay_tao DATETIME DEFAULT CURRENT_TIMESTAMP,
    ngay_cap_nhat DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
    `tai_khoan` (
        `tai_khoan`,
        `mat_khau`,
        `quyen`
    )
VALUES
    (
        'admin',
        '1',
        'admin'
    ),
    (
        'user',
        '1',
        'user'
    );

-- 5. Bang don_hang
CREATE TABLE don_hang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_tai_khoan INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(15) NULL,
    ngay_dat_hang DATETIME DEFAULT CURRENT_TIMESTAMP,
    trang_thai ENUM('Dang xu ly', 'Da giao', 'Huy') NOT NULL,
    tong_tien DECIMAL(10, 2) NOT NULL,
    dia_chi_giao TEXT NULL,
    FOREIGN KEY (id_tai_khoan) REFERENCES tai_khoan(id) ON DELETE CASCADE
);

-- 6. Bang chi_tiet_don_hang
CREATE TABLE chi_tiet_don_hang (
    id_chi_tiet INT AUTO_INCREMENT PRIMARY KEY,
    id_don_hang INT NOT NULL,
    id_san_pham INT NOT NULL,
    so_luong INT NOT NULL,
    gia DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_don_hang) REFERENCES don_hang(id) ON DELETE CASCADE,
    FOREIGN KEY (id_san_pham) REFERENCES san_pham(id) ON DELETE CASCADE
);

-- 7. Bang danh_gia
CREATE TABLE danh_gia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_san_pham INT NOT NULL,
    id_tai_khoan INT NOT NULL,
    sao INT CHECK(
        sao BETWEEN 1
        AND 5
    ),
    binh_luan TEXT NULL,
    ngay_tao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_san_pham) REFERENCES san_pham(id) ON DELETE CASCADE,
    FOREIGN KEY (id_tai_khoan) REFERENCES tai_khoan(id) ON DELETE CASCADE
);