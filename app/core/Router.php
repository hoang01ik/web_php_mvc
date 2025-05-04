<?php
class Router {
    private $routes = [];
    private $notFoundHandler;

    // Đăng ký route với một hoặc nhiều phương thức HTTP
    public function add($route, $methods, $handler) {
        $methods = (array)$methods; // Đảm bảo `$methods` là mảng
        foreach ($methods as $method) {
            $this->routes[strtoupper($method)][$route] = $handler; // Đăng ký handler cho từng phương thức
        }
    }

    // Đăng ký handler cho route không tìm thấy
    public function setNotFound($handler) {
        $this->notFoundHandler = $handler;
    }

    // Chạy ứng dụng
    public function run() {
        $method = $_SERVER['REQUEST_METHOD']; // Lấy phương thức yêu cầu (GET, POST, ...)
        $path = strtok($_SERVER['REQUEST_URI'], '?'); // Bỏ query string để chỉ lấy path

        // Tìm route phù hợp với phương thức và path
        foreach ($this->routes[$method] ?? [] as $route => $handler) {
            // Kiểm tra nếu route cố định
            if ($route === $path) {
                return call_user_func($handler);
            }

            // Kiểm tra nếu route có tham số động
            if (preg_match($this->convertToRegex($route), $path, $matches)) {
                array_shift($matches); // Bỏ phần tử đầu tiên (toàn bộ path)
                return call_user_func_array($handler, $matches); // Truyền tham số động
            }
        }

        if ($this->notFoundHandler) {
            return call_user_func($this->notFoundHandler);
        }
        echo "404 - Not Found";
    }

    private function convertToRegex($route) {
        return '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_-]+)', $route) . '$#';
    }
}
