<?php

class San_pham_model extends Model
{
    public function __construct()
    {
        parent::__construct('san_pham');
    }

    public function timkiem($text, $danhmuc  = null, $thuonghieu = null)
    {
        $sql = "
        SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.so_luong, sp.mo_ta, sp.anh_chinh, 
            th.ten AS ten_thuong_hieu, 
            GROUP_CONCAT(DISTINCT dm.ten SEPARATOR ', ') AS danh_muc 
        FROM san_pham sp
        LEFT JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id
        LEFT JOIN danh_muc_san_pham dms ON sp.id = dms.id_san_pham
        LEFT JOIN danh_muc dm ON dms.id_danh_muc = dm.id
        WHERE 1=1
    ";

        // Điều kiện tìm kiếm
        if (!empty($text)) {
            $sql .= " AND (sp.ten LIKE '%" . $this->conn->real_escape_string($text) . "%')";
            // $sql .= " OR th.ten LIKE '%" . $this->conn->real_escape_string($text) . "%'";
            // $sql .= " OR dm.ten LIKE '%" . $this->conn->real_escape_string($text) . "%')";
        }

        // Lọc theo danh mục
        if (!empty($danhmuc)) {
            $sql .= " AND dm.id = " . intval($danhmuc);
        }

        // Lọc theo thương hiệu
        if (!empty($thuonghieu)) {
            $sql .= " AND th.id = " . intval($thuonghieu);
        }

        // Thực thi truy vấn
        $resulta = $this->fetchAll($sql);
        $result = removeEmptyElements($resulta);
        // Kiểm tra và trả về dữ liệu
        if ($result) {
            return $result;
        } else {
            return [];
        }
    }

    public function getallsanpham($limit = 9)
    {
        $sql = "
        SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.so_luong, sp.mo_ta, sp.anh_chinh, 
            th.ten AS ten_thuong_hieu
        FROM san_pham sp
        LEFT JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id
        LIMIT " . intval($limit);
        return $this->fetchAll($sql);
    }
    public function getSanPhamMoi($limit = 10)
    {
        $sql = "
        SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.so_luong, sp.mo_ta, sp.anh_chinh, 
            th.ten AS ten_thuong_hieu
        FROM san_pham sp
        LEFT JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id
        ORDER BY sp.ngay_tao DESC
        LIMIT " . intval($limit);

        $result = $this->fetchAll($sql);

        if ($result) {
            return $result;
        } else {
            return [];
        }
    }

    public function getSanPhamGiamGia($limit = 10)
    {
        $sql = "
        SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.so_luong, sp.mo_ta, sp.anh_chinh, 
            th.ten AS ten_thuong_hieu
        FROM san_pham sp
        LEFT JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id
        WHERE sp.giam_gia > 0
        ORDER BY sp.giam_gia DESC, sp.ngay_tao DESC
        LIMIT " . intval($limit);

        $result = $this->fetchAll($sql);

        if ($result) {
            return $result;
        } else {
            return [];
        }
    }

    public function getSanPhamTheoDanhMuc($id_danh_muc, $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit; // Tính offset từ page
        $sql = "
        SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.so_luong, sp.mo_ta, sp.anh_chinh,
            th.ten AS ten_thuong_hieu,
            GROUP_CONCAT(DISTINCT dm.ten SEPARATOR ', ') AS danh_muc
        FROM san_pham sp
        LEFT JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id
        LEFT JOIN danh_muc_san_pham dms ON sp.id = dms.id_san_pham
        LEFT JOIN danh_muc dm ON dms.id_danh_muc = dm.id
        WHERE dm.id = ?
        GROUP BY sp.id
        LIMIT ? OFFSET ?
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iii', $id_danh_muc, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function getSanPhamTheoDanhMucVaThuongHieu($id_danh_muc, $id_thuong_hieu = null, $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit; // Tính offset từ page

        $sql = "
    SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.so_luong, sp.mo_ta, sp.anh_chinh,
           th.ten AS ten_thuong_hieu,
           GROUP_CONCAT(DISTINCT dm.ten SEPARATOR ', ') AS danh_muc
    FROM san_pham sp
    LEFT JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id
    LEFT JOIN danh_muc_san_pham dms ON sp.id = dms.id_san_pham
    LEFT JOIN danh_muc dm ON dms.id_danh_muc = dm.id
    WHERE dm.id = ?
    ";

        // Thêm điều kiện lọc theo thương hiệu nếu có
        if ($id_thuong_hieu) {
            $sql .= " AND th.id = ?";
        }

        $sql .= "
    GROUP BY sp.id
    LIMIT ? OFFSET ?
    ";

        $stmt = $this->conn->prepare($sql);

        if ($id_thuong_hieu) {
            $stmt->bind_param('iiii', $id_danh_muc, $id_thuong_hieu, $limit, $offset);
        } else {
            $stmt->bind_param('iii', $id_danh_muc, $limit, $offset);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function filterSanPham($filters, $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;

        $sql = "
        SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.so_luong, sp.mo_ta, sp.anh_chinh,
            th.ten AS ten_thuong_hieu,
            GROUP_CONCAT(DISTINCT dm.ten SEPARATOR ', ') AS danh_muc
        FROM san_pham sp
        LEFT JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id
        LEFT JOIN danh_muc_san_pham dms ON sp.id = dms.id_san_pham
        LEFT JOIN danh_muc dm ON dms.id_danh_muc = dm.id
        WHERE 1=1
        ";

        $params = [];

        // Lọc theo danh mục
        if (!empty($filters['danh_muc'])) {
            $placeholders = implode(',', array_fill(0, count($filters['danh_muc']), '?'));
            $sql .= " AND dm.id IN ($placeholders)";
            $params = array_merge($params, $filters['danh_muc']);
        }

        // Lọc theo thương hiệu
        if (!empty($filters['thuong_hieu'])) {
            $placeholders = implode(',', array_fill(0, count($filters['thuong_hieu']), '?'));
            $sql .= " AND th.id IN ($placeholders)";
            $params = array_merge($params, $filters['thuong_hieu']);
        }

        // Lọc theo giá
        if (!empty($filters['gia_min'])) {
            $sql .= " AND sp.gia >= ?";
            $params[] = $filters['gia_min'];
        }
        if (!empty($filters['gia_max'])) {
            $sql .= " AND sp.gia <= ?";
            $params[] = $filters['gia_max'];
        }

        $sql .= "
        GROUP BY sp.id
        LIMIT ? OFFSET ?
        ";

        $params[] = $limit;
        $params[] = $offset;

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(str_repeat('i', count($params)), ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSanPhamLienQuan($idSanPham, $idDanhMuc, $idThuongHieu, $limit = 4)
    {
        $sql = "
        SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.anh_chinh
        FROM san_pham sp
        LEFT JOIN danh_muc_san_pham dms ON sp.id = dms.id_san_pham
        WHERE sp.id != ? 
        AND (dms.id_danh_muc = ? OR sp.id_thuong_hieu = ?)
        GROUP BY sp.id
        ORDER BY RAND() 
        LIMIT ?
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iiii', $idSanPham, $idDanhMuc, $idThuongHieu, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function timkiemNangCao($filters, $sortBy = 'ngay_tao', $sortOrder = 'DESC', $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;

        $sql = "
    SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.so_luong, sp.mo_ta, sp.anh_chinh,
        th.ten AS ten_thuong_hieu,
        GROUP_CONCAT(DISTINCT dm.ten SEPARATOR ', ') AS danh_muc
    FROM san_pham sp
    LEFT JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id
    LEFT JOIN danh_muc_san_pham dms ON sp.id = dms.id_san_pham
    LEFT JOIN danh_muc dm ON dms.id_danh_muc = dm.id
    WHERE 1=1
    ";

        $params = [];

        // Áp dụng bộ lọc
        if (!empty($filters['text'])) {
            $sql .= " AND (sp.ten LIKE ? OR sp.mo_ta LIKE ?)";
            $searchText = "%" . $this->conn->real_escape_string($filters['text']) . "%";
            $params[] = $searchText;
            $params[] = $searchText;
        }

        // Lọc theo danh mục, thương hiệu, giá, số lượng
        // ... (Tương tự như filterSanPham)

        $sql .= " GROUP BY sp.id ORDER BY $sortBy $sortOrder LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function thongKeSanPham()
    {
        $sql = "
    SELECT COUNT(*) AS tong_san_pham,
            SUM(so_luong) AS tong_so_luong,
           SUM(gia * so_luong) AS doanh_thu_du_kien
    FROM san_pham
    ";
        $result = $this->fetchOne($sql);

        return $result ?: [];
    }

    public function locSanPhamNangCao($filters, $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;

        $sql = "
    SELECT sp.id, sp.ten, sp.gia, sp.giam_gia, sp.so_luong, sp.mo_ta, sp.anh_chinh,
        th.ten AS ten_thuong_hieu,
        GROUP_CONCAT(DISTINCT dm.ten SEPARATOR ', ') AS danh_muc
    FROM san_pham sp
    LEFT JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id
    LEFT JOIN danh_muc_san_pham dms ON sp.id = dms.id_san_pham
    LEFT JOIN danh_muc dm ON dms.id_danh_muc = dm.id
    WHERE 1=1
    ";

        // Lọc thêm các điều kiện
        if (!empty($filters['ngay_tao_tu'])) {
            $sql .= " AND sp.ngay_tao >= ?";
            $params[] = $filters['ngay_tao_tu'];
        }
        if (!empty($filters['ngay_tao_den'])) {
            $sql .= " AND sp.ngay_tao <= ?";
            $params[] = $filters['ngay_tao_den'];
        }

        $sql .= " GROUP BY sp.id LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findIn($data)
    {
        $sql = "SELECT * FROM san_pham WHERE id IN ($data)";
        return $this->fetchAll($sql);
    }

    public function findByThuonghieu($thuonghieu)
    {
        $sql = "SELECT san_pham.* FROM san_pham 
        LEFT JOIN thuong_hieu ON san_pham.id_thuong_hieu = thuong_hieu.id 
        WHERE thuong_hieu.ten = '$thuonghieu'";
        return $this->fetchAll($sql);
    }
}
