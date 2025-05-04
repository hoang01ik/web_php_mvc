<?php

class Danh_muc_san_pham_model extends Model {
    public function __construct() {
        parent::__construct('danh_muc_san_pham');
    }

    public function getDanhMucBySanPham($id_san_pham) {
        $sql = "SELECT dm.id, dm.ten
                FROM danh_muc dm
                JOIN danh_muc_san_pham dmsp ON dm.id = dmsp.id_danh_muc
                WHERE dmsp.id_san_pham = $id_san_pham";
        $result = $this->fetchAll($sql);
        return $result;
    }
    

    public function delete($id_san_pham) {
        $sql = "DELETE FROM danh_muc_san_pham WHERE id_san_pham = $id_san_pham";
        if ($this->query($sql)) {
            return true; // Trả về true khi xóa thành công
        }
        return false;
    
    }
}