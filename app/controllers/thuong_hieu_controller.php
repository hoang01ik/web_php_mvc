<?php

class Thuong_hieu_controller extends Controller {
    public function __construct() {
        $this->folder = 'thuong_hieu';
    }

    public function index()
    {
        $Thuong_hieu_model = new Thuong_hieu_model();
        $thuong_hieus = $Thuong_hieu_model->findAll();
        $this->render('index', [
            'title' => 'Quản lý thương hiệu',
            'thuong_hieus' => $thuong_hieus
        ], true);
    }

    public function add()
    {
        $Thuong_hieu_model = new Thuong_hieu_model();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $mota = getPost('mo_ta');
            // print_r($mota);
            // error_log($mota);
            // die();
            if ($Thuong_hieu_model->add()) {
                setFlash('success', 'Thêm mới thương hiệu thành công');
                header('Location: /admin/thuong-hieu'); // Chuyển hướng về danh sách
                exit();
            } else {
                setFlash('error', 'Thêm mới thương hiệu thất bại, vui lòng thử lại');
                header('Location: /admin/thuong-hieu'); // Chuyển hướng về danh sách
                exit();
            }
        }
        $this->render('add', ['title' => 'Thêm thương hiệu'], true);
    }

    public function edit($id)
    {
        $Thuong_hieu_model = new Thuong_hieu_model();
        $thuong_hieu = $Thuong_hieu_model->findById($id);
        // print_r($thuong_hieu);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($Thuong_hieu_model->edit($id)) {
                setFlash('success', 'Sửa thương hiệu thành công');
                header('Location: /admin/thuong-hieu'); // Chuyển hướng về danh sách
                exit();
            } else {
                setFlash('error', 'Sửa thương hiệu thất bại, vui lòng thử lại');
                header('Location: /admin/thuong-hieu'); // Chuyển hướng về danh sách
                exit();
            }
        }
        $this->render('edit', ['title' => 'Sửa thương hiệu', 'thuong_hieu' => $thuong_hieu], true);
    }

    public function delete($id)
    {
        $Thuong_hieu_model = new Thuong_hieu_model();
        if ($Thuong_hieu_model->delete($id)) {
            setFlash('success', 'Xóa thương hiệu thành công.');
        } else {
            setFlash('error', 'Xóa thương hiệu không thành công.');
        }
        header('Location: /admin/thuong-hieu'); // Chuyển hướng về danh sách
        exit();
    }
}