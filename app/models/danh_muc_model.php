<?php

class Danh_muc_model extends Model
{
    public function __construct()
    {
        parent::__construct('danh_muc');
    }

    public function add()
    {
        try {
            $data = [
                'ten' => getPost('ten'),
                'mo_ta' => getPost('mo_ta')
            ];
            return $this->insert($data);
        } catch (Exception $e) {
            echo 'Lỗi add danh mục: ',  $e->getMessage(), "\n";
        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'ten' => getPost('ten'),
                'mo_ta' => '' . getPost('mo_ta')
            ];
            return $this->update($data, $id);
        } catch (Exception $e) {
            echo 'Lỗi edit danh mục: ',  $e->getMessage(), "\n";
        }
    }

    public function getTenById($id)
    {
        try {
            $data =  $this->findById($id);
            return $data['ten'];
        } catch (Exception $e) {
            echo 'Lỗi getTenById danh mục: ',  $e->getMessage(), "\n";
        }
    }
}
