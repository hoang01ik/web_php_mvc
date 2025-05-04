<?php

class Donhang_controller extends Controller
{
    public function __construct()
    {
        $this->folder = 'donhang';
    }

    public function index()
    {
        $donhangmodel = new DonHangModel();
        $donhangs = $donhangmodel->findAll();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $donhang = $donhangmodel->findById($id);
            // var_dump($donhang);
            // foreach ($donhang['san_pham'] as $sanpham) {
            //     var_dump($sanpham);
            // }
            // exit;
            return $this->renderPlain('in', [
                'donhang' => $donhang,
            ]);
        }
        $this->render(
            'index',
            [
                'title' => 'Danh sách đơn hàng',
                'donhangs' => $donhangs
            ],
            admin: true
        );
    }
}


