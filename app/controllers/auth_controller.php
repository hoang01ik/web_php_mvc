<?php

class Auth_controller extends Controller {
    public function __construct(){
        $this->folder = 'auth';
    }

    public function edit_profile() {

    }

    public function register()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /'); // Chuyển hướng nếu đã đăng nhập
            exit();
        }
        $status = '';
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $User_Model = new Tai_khoan_model();
            $data = [
                'tai_khoan' => getPost('username'),
                'mat_khau' => getPost('password'),
                'confirmPassword' => getPost('confirmPassword')
            ];

            if (empty($data['tai_khoan']) || empty($data['mat_khau']) || empty($data['confirmPassword'])) {
                setFlash('error', 'Vui lòng điền đầy đủ thông tin.');
            } elseif ($data['mat_khau'] !== $data['confirmPassword']) {
                setFlash('error', 'Mật khẩu và xác nhận mật khẩu không khớp.');
            } else {
                if ($User_Model->findOne(['tai_khoan' => $data['tai_khoan']])) {
                    $status = 'error';
                    $message = "Tài khoản đã tồn tại.";
                } else {
                    $newUser = [
                        'tai_khoan' => $data['tai_khoan'],
                        'mat_khau' => $data['mat_khau'],
                        'quyen' => 'user'
                    ];
                    // var_dump($newUser);exit;
                    if ($User_Model->insert($newUser)) {
                        setFlash('success', 'Đăng ký thành công! Bạn có thể đăng nhập.');
                        header('Location: /login');
                        exit();
                    } else {
                        setFlash('error', 'Đăng ký không thành công. Vui lòng thử lại.');
                    }
                }
            }
        }

        $this->renderPlain('register', ['title' => 'Đăng ký tài khoản']);
    }
    public function login()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }
        $status = '';
        $message = ''; // Biến lưu trữ thông báo lỗi
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $User_Model = new Tai_khoan_model();
            $data = [
                'username' => getPost('username'),
                'mat_khau' => getPost('password')
            ];
            $user = $User_Model->getUserByUsername($data['username']);
            if ($user && $user['mat_khau'] == $data['mat_khau']) {
                $_SESSION['user'] = $user;
                // print_r($_SESSION['user']);
                header('Location:  /');
            } else {
                $status = 'error';
                $message = "Tên đăng nhập hoặc mật khẩu không đúng.";
            }
        }

        $this->renderPlain('login', ['title' => 'Đăng nhập', 'status' => $status, 'message' => $message]);
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /');
        exit();
    }
    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
        }
        $this->render('profile', [
            'title' => 'Thông tin tài khoản',
            'user' => $_SESSION['user']
        ]);
    }
}   