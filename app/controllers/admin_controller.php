<?php

class Admin_controller extends Controller
{
    public function __construct()
    {
        $this->folder = 'admin';
    }
    public function index()
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin']['role'] != 'admin') {
            $this->redirect('/admin/dashboard');
        }
        $tai_khoan_model = new Tai_khoan_model();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'tai_khoan' => getPost('username'),
                'mat_khau' => getPost('password')
            ];
            $admin = $tai_khoan_model->findOne(['tai_khoan' => $data['tai_khoan']]);
            // print_r($data);
            // die();
            if ($admin && $admin['mat_khau'] == $data['mat_khau'] && $admin['quyen'] == 'admin') {
                $_SESSION['admin'] = $admin;
                setFlash('success', 'Đăng nhập thành công');
                $this->redirect('/admin/dashboard');
                exit();
            }
        }
        $this->renderPlain('index', ['title' => 'Đăng nhập']);
    }

    public function dashboard()
    {
        $tai_khoan_model = new Tai_khoan_model();
        $donhangmodel = new DonHangModel();
        $sanphammodel = new San_pham_model();
        $sotaikhoan = $tai_khoan_model->getCount();
        $sodonhang = $donhangmodel->getCount();
        $sosanpham = $sanphammodel->getCount();
        $this->render('dashboard', [
            'title' => 'Dashboard',
            'sotaikhoan' => $sotaikhoan,
            'sodonhang' => $sodonhang,
            'sosanpham' => $sosanpham
        ], true);
    }

    public function profile()
    {
        $tai_khoan_model = new Tai_khoan_model();
        if (array_key_exists('doimatkhau', $_POST)) {
            $matkhau = getPost('matkhau');
            $matkhaumoi = getPost('matkhaumoi');
            $matkhaumoia = getPost('matkhaumoia');

            if ($_SESSION['admin']['mat_khau'] != $matkhau) {
                setFlash('error', 'Sai mật khẩu');
                $this->redirect('/admin/profile');
                exit();
            }

            if ($matkhaumoi == $matkhau) {
                setFlash('error', 'Mật khẩu mới phải khác mật khẩu cũ.');
                $this->redirect('/admin/profile');
                exit();
            }

            if ($matkhaumoi != $matkhaumoia) {
                setFlash('error', 'Mật khẩu nhập lại không đúng với mật khẩu mới.');
                $this->redirect('/admin/profile');
                exit();
            }

            if ($tai_khoan_model->update(['mat_khau' => $matkhaumoi], $_SESSION['admin']['mat_khau'])) {
                $_SESSION['admin'] = $tai_khoan_model->findById($_SESSION['admin']['id']);
                setFlash('success', 'Đổi mật khẩu thành công');
                $this->redirect('/admin/profile');
                exit();
            }
        }

        if (array_key_exists('editprofile', $_POST)) {
            $data = [
                'ten' => getPost('ten'),
                'email' => getPost('email'),
                'so_dien_thoai' => getPost('phone'),
                'dia_chi' => getPost('diachi')
            ];
            if ($tai_khoan_model->update($data, $_SESSION['admin']['id'])) {
                $_SESSION['admin'] = $tai_khoan_model->findById($_SESSION['admin']['id']);
                setFlash('success', 'Cập nhật thành công');
                $this->redirect('/admin/profile');
                exit();
            }
        }
        $this->render('profile', ['title' => 'Profile'], true);
    }
}
