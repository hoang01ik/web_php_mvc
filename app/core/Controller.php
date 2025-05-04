<?php

class Controller
{
    protected $folder = null;

    // Hàm render view với dữ liệu và layout
    public function render($view, $data = [],bool $admin = false )
    {
        // Xác định đường dẫn của file view
        $viewFile = 'app/views/pages/' . $this->folder . '/' . $view . '.php';

        // Kiểm tra xem file view có tồn tại không
        if (is_file($viewFile)) {
            // Truyền dữ liệu vào biến
            extract($data);
            ob_start();
            require_once($viewFile);
            $content = ob_get_clean();
            if ($admin === false) {
                require_once('app/views/layouts/base.php');
            } elseif ($admin) {
                require_once('app/views/layouts/admin.php');
            }
        } else {
            $this->redirect('/');
        }
    }

    // Hàm chuyển hướng tới một URL
    protected function redirect($url)
    {
        header("Location: " . $url);
        exit(); // Dừng quá trình sau khi chuyển hướng
    }

    // Hàm render lỗi 404 khi không tìm thấy view hoặc route
    protected function error404()
    {
        http_response_code(404);
        echo "404 - Page Not Found";
    }

    // Hàm truyền tải dữ liệu vào view mà không cần layout
    public function renderPlain($view, $data = [])
    {
        $viewFile = 'app/views/pages/' . $this->folder . '/' . $view . '.php';
        
        if (is_file($viewFile)) {
            extract($data); // Truyền dữ liệu vào view
            require_once($viewFile);
        } else {
            $this->error404();
        }
    }
}
