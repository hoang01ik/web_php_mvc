<?php
require_once 'app/core/unit.php';
require_once 'app/core/Controller.php';
require_once 'app/core/Model.php';
require_once 'app/core/Router.php';

require_once 'app/models/danh_muc_model.php';
require_once 'app/models/thuong_hieu_model.php';
require_once 'app/models/anh_san_pham.php';
require_once 'app/models/san_pham_model.php';
require_once 'app/models/danh_muc_san_pham_model.php';
require_once 'app/models/tai_khoan_model.php';
require_once 'app/models/don_hang_model.php';
require_once 'app/models/chi_tiet_don_hang.php';

require_once 'app/controllers/admin_controller.php';
require_once 'app/controllers/danh_muc_controller.php';
require_once 'app/controllers/thuong_hieu_controller.php';
require_once 'app/controllers/san_pham_controller.php';
require_once 'app/controllers/tai_khoan_controller.php';
require_once 'app/controllers/auth_controller.php';
require_once 'app/controllers/default_controller.php';
require_once 'app/controllers/donhang_controller.php';

class App
{
    public function __construct()
    {

        if (!isset($_SESSION['card'])) {
            $_SESSION['card'] = [];
            // print('khởi tạo thành công');
        }

        $thuonghieumodel = new Thuong_hieu_model();
        $_SESSION['thuonghieu'] = $thuonghieumodel->findAll();
        // var_dump($_SESSION['thuonghieu']);exit;


        $router = new Router();
        require_once 'app/routers/admin.php';
        require_once 'app/routers/danh_muc.php';
        require_once 'app/routers/thuong_hieu.php';
        require_once 'app/routers/san_pham.php';
        require_once 'app/routers/tai_khoan.php';
        require_once 'app/routers/auth.php';
        require_once 'app/routers/default.php';
        require_once 'app/routers/donhang.php';
        $router->setNotFound(function () {
            echo "404 - Trang không tồn tại!";
        });
        $router->run();
    }
}
