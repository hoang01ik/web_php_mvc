<?php

class San_pham_controller extends Controller
{
    public function __construct()
    {
        $this->folder = 'san_pham';
    }

    public function index()
    {
        $san_pham_model = new San_pham_model();
        $sanphams = $san_pham_model->findAll();
        $thuong_hieus = (new Thuong_hieu_model())->findAll();

        $this->render(
            'index',
            [
                'title' => 'Sản phẩm',
                'sanphams' => $sanphams,
                'thuong_hieus' => $thuong_hieus
            ],
            true
        );
    }

    public function add()
    {
        try {
            $danh_muc_model = new Danh_muc_model();
            $thuong_hieu_model = new Thuong_hieu_model();
            $danh_muc_san_pham_model = new Danh_muc_san_pham_model();

            $san_pham_model = new San_pham_model();
            $anh_san_phamModel = new Anh_san_pham();

            $danh_mucs = $danh_muc_model->findAll();
            $thuong_hieus = $thuong_hieu_model->findAll();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'ten'           => getPost('ten'),
                    'id_thuong_hieu'   => getPost('id_thuong_hieu'),
                    'gia'           => getPost('gia'),
                    'giam_gia'      => isset($_POST['giam_gia']) ? getPost('giam_gia') : 0,
                    'so_luong'      => getPost('so_luong'),
                    'mo_ta'         => getPost('mo_ta'),
                    'anh_chinh'     => ''
                ];

                $anh_san_pham = isset($_FILES['anh_san_pham']) ? $_FILES['anh_san_pham'] : '';
                $danh_muc_san_pham = getPost('danh_muc');

                $data['anh_chinh'] = handleFileUpload('anh_chinh');

                // print_r($danh_muc_san_pham);
                // foreach ($danh_muc_san_pham as $key => $value) {
                //     print_r($value);
                // }
                // die();
                $id = $san_pham_model->insert($data);

                if ($id) {
                    foreach ($danh_muc_san_pham as $key => $value) {
                        print_r($value);
                        if ($danh_muc_san_pham_model->insert(['id_san_pham' => $id, 'id_danh_muc' => $value])) {
                            error_log('lưu thành công id ' . $value);
                        } else {
                            setFlash('error', 'Thêm sản phẩm không thành công. Vui lòng thử lại.');
                            // $san_pham_model->delete($id);
                            // header('Location: /admin/san-pham');
                            // exit();
                        }
                    }

                    foreach ($anh_san_pham['tmp_name'] as $key => $value) {
                        $file = [
                            'name' => $anh_san_pham['name'][$key],
                            'type' => $anh_san_pham['type'][$key],
                            'tmp_name' => $value,
                            'error' => $anh_san_pham['error'][$key],
                            'size' => $anh_san_pham['size'][$key],
                        ];
                        $newfile = uploadFile($file);
                        print_r($newfile);
                        if ($anh_san_phamModel->insert(['id_san_pham' => $id, 'url_anh' => $newfile])) {
                            error_log('lưu thành công file ' . $newfile);
                        } else {
                            setFlash('error', 'Thêm sản phẩm không thành công. Vui lòng thử lại.');
                            // $san_pham_model->delete($id);
                            // header('Location: /admin/san-pham');
                            // exit();
                        }
                    }
                    setFlash('success', 'Thêm sản phẩm thành công!');
                    header('Location: /admin/san-pham');
                    exit();
                } else {
                    setFlash('error', 'Thêm sản phẩm không thành công. Vui lòng thử lại.');
                    header('Location: /admin/san-pham');
                    exit();
                }
            }
            $this->render(
                'add',
                [
                    'title' => 'Thêm sản phẩm',
                    'danh_mucs' => $danh_mucs,
                    'thuong_hieus' => $thuong_hieus
                ],
                true
            );
        } catch (Exception $e) {
            echo 'Lỗi add sản phẩm: ',  $e->getMessage(), "\n";
        }
    }

    public function edit($id)
    {
        $danh_muc_model = new Danh_muc_model();
        $thuong_hieu_model = new Thuong_hieu_model();
        $danh_muc_san_pham_model = new Danh_muc_san_pham_model();

        $san_pham_model = new San_pham_model();
        $anh_san_phamModel = new Anh_san_pham();

        $danh_mucs = $danh_muc_model->findAll();
        $thuong_hieus = $thuong_hieu_model->findAll();

        $danh_muc_san_phams = array_column($danh_muc_san_pham_model->findAll(['id_san_pham' => $id]), 'id_danh_muc');
        $san_pham = $san_pham_model->findById($id);
        $anh_san_phams = $anh_san_phamModel->findAll(['id_san_pham' => $id]);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ten'           => getPost('ten'),
                'id_thuong_hieu'   => getPost('id_thuong_hieu'),
                'gia'           => getPost('gia'),
                'giam_gia'      => isset($_POST['giam_gia']) ? getPost('giam_gia') : 0,
                'so_luong'      => getPost('so_luong'),
                'mo_ta'         => getPost('mo_ta'),
                'anh_chinh'     => ''
            ];

            $anh_san_pham = isset($_FILES['anh_san_pham']) ? $_FILES['anh_san_pham'] : '';
            $danh_muc_san_pham = getPost('danh_muc');

            $anhchinh = handleFileUpload('anh_chinh', $san_pham['anh_chinh']);

            if ($anhchinh) {
                $data['anh_chinh'] = $anhchinh;
            } else {
                $data['anh_chinh'] = $san_pham['anh_chinh'];
            }

            if ($san_pham_model->update($data, $id)) {
                if ($anh_san_pham) {
                    if ($anh_san_phamModel->deleteByIdSP($id)) {
                        foreach ($anh_san_pham['tmp_name'] as $key => $value) {
                            $file = [
                                'name' => $anh_san_pham['name'][$key],
                                'type' => $anh_san_pham['type'][$key],
                                'tmp_name' => $value,
                                'error' => $anh_san_pham['error'][$key],
                                'size' => $anh_san_pham['size'][$key],
                            ];
                            $newfile = uploadFile($file);
                            print_r($newfile);
                            if ($anh_san_phamModel->insert(['id_san_pham' => $id, 'url_anh' => $newfile])) {
                                error_log('lưu thành công file ' . $newfile);
                            } else {
                                setFlash('error', 'Thêm sản phẩm không thành công. Vui lòng thử lại.');
                                // $san_pham_model->delete($id);
                                // header('Location: /admin/san-pham');
                                // exit();
                            }
                        }
                    }
                }
                if ($danh_muc_san_pham_model->delete($id)) {
                    foreach ($danh_muc_san_pham as $key => $value) {
                        print_r($value);
                        if ($danh_muc_san_pham_model->insert(['id_san_pham' => $id, 'id_danh_muc' => $value])) {
                            error_log('lưu thành công id ' . $value);
                        } else {
                            setFlash('error', 'Thêm sản phẩm không thành công. Vui lòng thử lại.');
                            // $san_pham_model->delete($id);
                            // header('Location: /admin/san-pham');
                            // exit();
                        }
                    }
                }
                setFlash('success', 'Sửa sản phẩm thành công!');
                header('Location: /admin/san-pham');
                exit();
            } else {
                setFlash('error', 'Sửa sản phẩm không thành công. Vui lòng thử lại.');
                header('Location: /admin/san-pham');
                exit();
            }
        }
        $this->render(
            'edit',
            [
                'title' => 'Sửa sản phẩm',
                'danh_mucs' => $danh_mucs,
                'thuong_hieus' => $thuong_hieus,
                'danh_muc_san_phams' => $danh_muc_san_phams,
                'san_pham' => $san_pham,
                'anh_san_phams' => $anh_san_phams
            ],
            true
        );
    }

    public function delete($id)
    {
        $san_pham_model = new San_pham_model();
        $anh_san_phamModel = new Anh_san_pham();

        $san_pham = $san_pham_model->findById($id);
        $anh_san_phams = $anh_san_phamModel->findAll(['id_san_pham' => $id]);

        if ($san_pham_model->delete($id)) {
            delete_img($san_pham['anh_chinh']);
            foreach ($anh_san_phams as $anh) {
                delete_img($anh['url_anh']);
            }
            setFlash('success', 'Xóa sản phẩm thành công.');
        } else {
            setFlash('error', 'Xóa sản phẩm không thành công.');
        }
        header('Location: /admin/san-pham'); // Chuyển hướng về danh sách
        exit();
    }


    public function detail()
    {

        $danh_muc_model = new Danh_muc_model();
        $thuong_hieu_model = new Thuong_hieu_model();
        $danh_muc_san_pham_model = new Danh_muc_san_pham_model();

        $san_pham_model = new San_pham_model();
        $anh_san_phamModel = new Anh_san_pham();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;



        if ($id) {
            $sanpham = $san_pham_model->findById($id);
            $danh_mucs = $danh_muc_model->findAll();
            $thuong_hieus = $thuong_hieu_model->findAll();
            $danh_muc_san_phams = array_column($danh_muc_san_pham_model->findAll(['id_san_pham' => $id]), 'id_danh_muc');
            $anh_san_phams = $anh_san_phamModel->findAll(['id_san_pham' => $id]);
            if (array_key_exists('deleteAnhs', $_POST)) {
                $anhs = getPost('anh');
                // print_r($anhs);
                if ($anhs) {
                    foreach ($anhs as $anh) {
                        print_r($anh);
                        $anh_san_phamModel->delete($anh);
                    }
                    setFlash('success', 'Xóa ảnh sản phẩm thành công.');
                    header('Location: /admin/san-pham/detail?id=' . $id);
                    exit();
                } else {
                    setFlash('error', 'Xóa ảnh sản phẩm không thành công.');
                }
            }
            if (array_key_exists('uploadanh', $_POST)) {
                $anhid = getPost('anhId');
                $anhcu = $anh_san_phamModel->findById($anhid);
                if ($anhcu) {
                    $nameanh = handleFileUpload('anhmoi', $anhcu['url_anh']);
                    if ($anh_san_phamModel->update(['url_anh' => $nameanh], $anhid)) {
                        setFlash('success', 'Cập nhật ảnh thành công.');
                        header('Location: /admin/san-pham/detail?id=' . $id);
                        exit();
                    } else {
                        setFlash('error', 'Cập nhật ảnh không thành công.');
                    }
                }
            }
            if (array_key_exists('updatedanhmuc', $_POST)) {
                $danhmucSpNew = getPost('danhmuc');
                if ($danh_muc_san_pham_model->delete($id)) {
                    foreach ($danhmucSpNew as $idDanhMuc) {
                        if ($danh_muc_san_pham_model->insert(['id_san_pham' => $id, 'id_danh_muc' => $idDanhMuc])) {
                            error_log('lưu thành công id ' . $idDanhMuc);
                        } else {
                            setFlash('error', 'Lưu danh mục không thành công. Vui lòng thử lại.');
                            die();
                            // header('Location: /admin/san-pham/detail?id=' . $id);
                            // exit();
                        }
                    }
                } else {
                    echo 'ko xóa đc';
                    die();
                }
                setFlash('success', 'Lưu danh mục thành công.');
                header('Location: /admin/san-pham/detail?id=' . $id);
                exit();
            }
            if (array_key_exists('addanh', $_POST)) {
                $nameanh = handleFileUpload('anhnew', $anhcu['url_anh']);
                if ($nameanh) {
                    if ($anh_san_phamModel->insert(['id_san_pham' => $id, 'url_anh' => $nameanh])) {
                        setFlash('success', 'Thêm ảnh thành công.');
                        header('Location: /admin/san-pham/detail?id=' . $id);
                        exit();
                    } else {
                        setFlash('error', 'Thêm ảnh không thành công.');
                    }
                }
            }
            if ($sanpham) {
                $this->render(
                    'detail',
                    [
                        'title' => 'Chi tiết sản phẩm',
                        'sanpham' => $sanpham,
                        'danh_muc_san_phams' => $danh_muc_san_phams,
                        'anh_san_phams' => $anh_san_phams,
                        'danh_mucs' => $danh_mucs,
                        'thuong_hieus' => $thuong_hieus
                    ],
                    true
                );
            }
        }
        $this->render(
            'detail',
            [
                'title' => 'Chi tiết sản phẩm'
            ],
            true
        );
    }


}
