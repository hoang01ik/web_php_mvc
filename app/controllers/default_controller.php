<?php

class Default_controller extends Controller
{
    public function __construct()
    {
        $this->folder = 'default';
    }

    public function index()
    {
        $sanpham_model = new San_pham_model();

        $sanphamnew = $sanpham_model->getSanPhamMoi();
        // print_r($sanphamnew);
        // die;
        $sanphams = $sanpham_model->getallsanpham();
        $this->render(
            'index',
            [
                'title' => 'Trang chủ',
                'sanphamnew' => $sanphamnew,
                'sanphams' => $sanphams
            ]
        );
    }

    public function timkiem()
    {
        $sanpham_model = new San_pham_model();
        $text = getGet('timkiem');
        $danhmuc = getGet('danhmuc');
        $thuonghieu = getGet('thuonghieu');

        // Kiểm tra nếu từ khóa rỗng
        if (empty($text)) {
            redirect('/');
        }
        if ($danhmuc == 0) {
            $danhmuc = '';
        }

        // Gọi phương thức tìm kiếm từ model
        $ketqua = $sanpham_model->timkiem($text, $danhmuc, $thuonghieu);

        // Kiểm tra nếu không tìm thấy kết quả
        if (empty($ketqua)) {
            $this->render('timkiem', [
                'title' => 'Kết quả tìm kiếm',
                'message' => 'Không tìm thấy sản phẩm phù hợp!',
                'sanpham' => [],
            ]);
            return;
        }


        // print_r($ketqua);
        // die;
        // Render giao diện tìm kiếm với kết quả
        $this->render('timkiem', [
            'title' => 'Kết quả tìm kiếm',
            'sanpham' => $ketqua,
        ]);
    }

    public function sanpham()
    {
        $id = getGet('id');
        $sanpham_model = new San_pham_model();
        $anhsp_model = new Anh_san_pham();
        $dm_sp_model = new Danh_muc_san_pham_model();
        if ($id) {
            // Kiểm tra tính hợp lệ của ID
            if (!is_numeric($id)) {
                setFlash('error', 'ID sản phẩm không hợp lệ.');
                redirect('/sanpham');
            }

            // Tìm sản phẩm theo ID
            $sanpham = $sanpham_model->findById($id);
            $dm_sp = $dm_sp_model->getDanhMucBySanPham($id);
            $anhs = $anhsp_model->getByIdSp($id);
            $data = [
                'title' => 'Chi tiết sản phẩm',
                'sanpham' => $sanpham,
                'dm_sp' => $dm_sp,
                'anhs' => $anhs,
            ];
            // var_dump($sanpham);
            // exit;
            if ($sanpham) {
                $this->render('detail', [
                    'title' => 'Chi tiết sản phẩm',
                    'sanpham' => $sanpham,
                    'anhs' => $anhs,
                    'dm_sp' => $dm_sp,
                ]);
            } else {
                $this->render('detail', [
                    'title' => 'Chi tiết sản phẩm',
                    'message' => 'Sản phẩm không tồn tại.'
                ]);
            }
        } else {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $sanphams = [];
            $limit = 12;
            // Lấy tất cả sản phẩm nếu không có ID
            $sanphams = $sanpham_model->findWithPagination($page, $limit);
            $total = $sanpham_model->getCount();
            $totalPages = ceil($total / $limit);
            $this->render('sanpham', [
                'title' => 'Danh sách sản phẩm',
                'sanpham' => $sanphams,
                'totalPages' => $totalPages,
                'currentPage' => $page
            ]);
        }
    }

    public function giohang()
    {

        $San_pham_model = new San_pham_model();

        if (isset($_GET['action'])) {
            function update_card()
            {
                foreach ($_POST['soluong'] as $id => $soluong) {
                    // var_dump($_SESSION['card'][$id]);
                    // exit;
                    if ($soluong == 0) {
                        unset($_SESSION['card'][$id]);
                    } else {
                        $_SESSION['card'][$id] = $soluong;
                    }
                }
            }
            switch ($_GET['action']) {
                case "add":
                    update_card();
                    $this->redirect('/giohang');
                    break;
                case "delete":
                    if (isset($_GET['id'])) {
                        unset($_SESSION['card'][$_GET['id']]);
                    }
                    break;
                case "submit":
                    if (isset($_POST['update_click'])) {
                        // var_dump($_POST);exit;
                        update_card();
                        redirect('/giohang');
                    }
                    if (isset($_POST['dathang'])) {
                        if (empty($_POST['name'])) {
                            setFlash('error', 'Bạn chưa nhập tên người nhận');
                            redirect('/giohang');
                            exit;
                        }
                        if (empty($_POST['email'])) {
                            setFlash('error', 'Bạn chưa nhập email người nhận');
                            redirect('/giohang');
                            exit;
                        }
                        if (empty($_POST['address'])) {
                            setFlash('error', 'Bạn chưa nhập địa chỉ người nhận');
                            redirect('/giohang');
                            exit;
                        }
                        if (empty($_POST['tel'])) {
                            setFlash('error', 'Bạn chưa nhập số điện thoại người nhận');
                            redirect('/giohang');
                            exit;
                        }
                        if (empty($_POST['soluong'])) {
                            setFlash('error', 'Giỏ hàng rỗng');
                            redirect('/giohang');
                            exit;
                        }

                        $datas = implode(',', array_keys($_SESSION['card']));
                        $sanphams = $San_pham_model->findIn($datas);
                        $tong_tien = 0;
                        foreach ($sanphams as $sanpham) {
                            $tong_tien += $sanpham['gia'] * $_SESSION['card'][$sanpham['id']];
                        }

                        $data_don_hang = [
                            'id_tai_khoan' => $_SESSION['user']['id'],
                            'name' => $_POST['name'],
                            'email' => $_POST['email'],
                            'dia_chi_giao' => $_POST['address'],
                            'tel' => $_POST['tel'],
                            'tong_tien' => $tong_tien,
                            'trang_thai' => 'Dang xu ly'
                        ];
                        // var_dump($data_don_hang);exit;
                        $Don_Hang_model = new DonHangModel();
                        $chi_tiet_don_hangModel = new Chi_tiet_don_hang();

                        $id_don_hang = $Don_Hang_model->insert($data_don_hang);

                        if (isset($id_don_hang)) {
                            $check = false;
                            foreach ($sanphams as $sanpham) {
                                $data_don_hang_chi_tiet = [
                                    'id_don_hang' => $id_don_hang,
                                    'id_san_pham' => $sanpham['id'],
                                    'so_luong' => $_SESSION['card'][$sanpham['id']],
                                    'gia' => $sanpham['gia']
                                ];
                                $soluongmoi = $sanpham['so_luong'] - $_SESSION['card'][$sanpham['id']];
                                $San_pham_model->update(['so_luong' => $soluongmoi], $sanpham['id']);
                                // var_dump($data_don_hang_chi_tiet);exit;
                                if ($chi_tiet_don_hangModel->insert($data_don_hang_chi_tiet)) {
                                    $check = true;
                                } else {
                                    $check = false;
                                }
                            }
                            if ($check) {
                                unset($_SESSION['card']);
                                setFlash('success', 'Đặt hàng thành công');
                                redirect('/giohang');
                                exit;
                            } else {

                                setFlash('error', 'Đặt hàng thất bại');
                                redirect('/giohang');
                                exit;
                            }
                        }
                    }
                    break;
            }
        }
        if (!empty($_SESSION['card'])) {
            $datas = implode(',', array_keys($_SESSION['card']));
            $sanphams = $San_pham_model->findIn($datas);
            $this->render('checkout', [
                'title' => 'Giỏ hàng',
                'sanphams' => $sanphams,
            ]);
            // var_dump($sanphams);
            // exit;
        }
        $this->render('checkout', [
            'title' => 'Giỏ hàng',
        ]);
    }

    public function thuonghieu()
    {
        $sanphammodel = new San_pham_model();
        $thuonghieu = isset($_GET['ten']) ? $_GET['ten'] : '';
        if (empty($thuonghieu)) {
            redirect('/');
        }
        $sanpham = $sanphammodel->findByThuonghieu($thuonghieu);
        // var_dump($sanpham);exit;
        $this->render('timkiem', [
            'title' => $thuonghieu,
            'sanpham' => $sanpham
        ]);
    }
}
