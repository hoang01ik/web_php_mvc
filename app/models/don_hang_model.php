<?php

class DonHangModel extends Model
{
    public function __construct()
    {
        parent::__construct('don_hang');
    }

    public function findById($id)
    {
        // Chuẩn bị câu truy vấn SQL
        $sql = "SELECT 
                    dh.*,
                    sp.ten AS ten_san_pham,
                    ctdh.so_luong,
                    ctdh.gia AS gia_san_pham
                FROM 
                    don_hang dh
                JOIN 
                    chi_tiet_don_hang ctdh ON dh.id = ctdh.id_don_hang
                JOIN 
                    san_pham sp ON ctdh.id_san_pham = sp.id
                WHERE 
                    dh.id = $id";
        // Lấy tất cả kết quả
        $data = $this->fetchAll($sql);
        // Trả về kết quả hoặc null nếu không tìm thấy

        // var_dump($data);exit;

        $result = [];
        foreach ($data as $item) {
            if (empty($result)) {
                $result = [
                    "id" => $item['id'],
                    "id_tai_khoan" => $item['id_tai_khoan'],
                    "name" => $item['name'],
                    "email" => $item['email'],
                    "tel" => $item['tel'],
                    "ngay_dat_hang" => $item['ngay_dat_hang'],
                    "trang_thai" => $item['trang_thai'],
                    "tong_tien" => $item['tong_tien'],
                    "dia_chi_giao" => $item['dia_chi_giao'],
                    "san_pham" => []
                ];
            }
            $result['san_pham'][] = [
                'ten_san_pham' => $item['ten_san_pham'],
                'so_luong' => $item['so_luong'],
                'gia_san_pham' => $item['gia_san_pham']
            ];
        }
        // var_dump($result);
        // exit;
        // Định dạng lại kết quả
        // $result = array_values($result);

        return $result ?: null;
    }
}
