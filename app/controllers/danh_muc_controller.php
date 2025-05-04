<?php

class Danh_muc_controller extends Controller
{
    public function __construct()
    {
        $this->folder = 'danh_muc';
    }

    public function index()
    {
        $danh_muc_model = new Danh_muc_model();
        $danh_mucs = $danh_muc_model->findAll();
        $this->render('index', [
            'title' => 'Quản lý danh mục',
            'danh_mucs' => $danh_mucs
        ], true);
    }

    public function add()
    {
        $danh_muc_model = new Danh_muc_model();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $mota = getPost('mo_ta');
            // print_r($mota);
            // error_log($mota);
            // die();
            if ($danh_muc_model->add()) {
                setFlash('success', 'Thêm mới danh mục thành công');
                header('Location: /admin/danh-muc'); // Chuyển hướng về danh sách
                exit();
            } else {
                setFlash('error', 'Thêm mới danh mục thất bại, vui lòng thử lại');
                header('Location: /admin/danh-muc'); // Chuyển hướng về danh sách
                exit();
            }
        }
        $this->render('add', ['title' => 'Thêm danh mục'], true);
    }

    public function edit($id)
    {
        $danh_muc_model = new Danh_muc_model();
        $danh_muc = $danh_muc_model->findById($id);
        // print_r($danh_muc);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($danh_muc_model->edit($id)) {
                setFlash('success', 'Sửa danh mục thành công');
                header('Location: /admin/danh-muc'); // Chuyển hướng về danh sách
                exit();
            } else {
                setFlash('error', 'Sửa danh mục thất bại, vui lòng thử lại');
                header('Location: /admin/danh-muc'); // Chuyển hướng về danh sách
                exit();
            }
        }
        $this->render('edit', ['title' => 'Sửa danh mục', 'danh_muc' => $danh_muc], true);
    }

    public function delete($id)
    {
        $danh_muc_model = new Danh_muc_model();
        if ($danh_muc_model->delete($id)) {
            setFlash('success', 'Xóa danh mục thành công.');
        } else {
            setFlash('error', 'Xóa danh mục không thành công.');
        }
        header('Location: /admin/danh-muc'); // Chuyển hướng về danh sách
        exit();
    }
}
