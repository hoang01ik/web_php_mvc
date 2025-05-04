<?php

class Anh_san_pham extends Model {
    public function __construct() {
        parent::__construct('anh_san_pham');
    }

    public function deleteByIdSP($id_san_pham){
        $sql = "DELETE FROM 'anh_san_pham' WHERE id_san_pham = $id_san_pham";
        if ($this->query($sql)) {
            return true; // Trả về true khi xóa thành công
        }
        return false;
    }

    public function getByIdSp($id){
        $sql = "SELECT * FROM anh_san_pham WHERE id_san_pham = $id";
        return $this->fetchAll($sql);
    }
}