<?php

class Tai_khoan_controller extends Controller
{
    public function __construct()
    {
        $this->folder = 'tai_khoan';
    }

    public function index()
    {
        $tai_khoan_model = new Tai_khoan_model();
        $tai_khoans = $tai_khoan_model->findAll();
        $this->render('index', [
            'title' => 'Quản lý tài khoản',
            'tai_khoans' => $tai_khoans
        ], true);
    }

    public function edit($id)
    {
        $tai_khoan_model = new Tai_khoan_model();
        $tai_khoan = $tai_khoan_model->findById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'mat_khau' => getPost('mat_khau'),
                'ten' => getPost('ten'),
                'email' => getPost('email'),
                'so_dien_thoai' => getPost('so_dien_thoai'),
                'dia_chi' => getPost('dia_chi'),
                'quyen' => getPost('quyen')
            ];
            if ($tai_khoan_model->update($data, $id)) {
                setFlash('success', 'Cập nhật tài khoản thành công');
                header('Location: /admin/tai-khoan'); // Chuyển hướng về danh sách
                exit();
            } else {
                setFlash('error', 'Cập nhật tài khoản thất bại, vui lòng thử lại');
                header('Location: /admin/tai-khoan'); // Chuyển hướng về danh sách
                exit();
            }
        }
        $this->render('edit', [
            'title' => 'Quản lý tài khoản',
            'tai_khoan' => $tai_khoan
        ], true);
    }

    public function delete($id)
    {
        $tai_khoan_model = new Tai_khoan_model();
        if ($id != $_SESSION['admin']['id']) {
            if ($tai_khoan_model->delete($id)) {
                setFlash('success', 'Xóa tài khoản thành công.');
            } else {
                setFlash('error', 'Xóa tài khoản không thành công.');
            }
            header('Location: /admin/tai-khoan');
            exit();
        } else {
            setFlash('error', 'Không thể xóa tài khoản bản thân.');
            header('Location: /admin/tai-khoan');
            exit();
        }
    }

    
}
