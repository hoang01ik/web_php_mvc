<?php

$router->add('/', ['GET', 'POST'], function () {
    return (new Default_controller())->index();
});

$router->add('/timkiem', ['GET', 'POST'], function () {
    return (new Default_controller())->timkiem();
});

$router->add('/sanpham', ['GET', 'POST'], function () {
    return (new Default_controller())->sanpham();
});

$router->add('/giohang', ['GET', 'POST'], function () {
    checkLogin();
    return (new Default_controller())->giohang();
});

$router->add('/thuonghieu', ['GET', 'POST'], function () {
    return (new Default_controller())->thuonghieu();
});
