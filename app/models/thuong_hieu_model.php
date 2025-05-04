<?php

class Thuong_hieu_model extends Model {
    public function __construct() {
        parent::__construct('thuong_hieu');
    }

    public function add()
    {
        try {
            $data = [
                'ten' => getPost('ten')
            ];
            return $this->insert($data);
        } catch (Exception $e) {
            echo 'Lỗi add thương hiệu: ',  $e->getMessage(), "\n";
        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'ten' => getPost('ten')
            ];
            return $this->update($data, $id);
        } catch (Exception $e) {
            echo 'Lỗi edit thương hiệu: ',  $e->getMessage(), "\n";
        }
    }

    public function getTenById($id)
    {
        try {
            $data =  $this->findById($id);
            return $data['ten'];
        } catch (Exception $e) {
            echo 'Lỗi getTenById thương hiệu: ',  $e->getMessage(), "\n";
        }
    }
}