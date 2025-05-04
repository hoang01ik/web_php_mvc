<?php
$router->add('/admin/thuong-hieu', ['GET', 'POST'], function () {
    checkAdmin();
    return (new Thuong_hieu_controller())->index();
});

$router->add('/admin/thuong-hieu/add', ['GET', 'POST'], function () {
    checkAdmin();
    return (new Thuong_hieu_controller())->add();
});

$router->add('/admin/thuong-hieu/edit/{id}', ['GET', 'POST'], function ($id) {
    checkAdmin();
    return (new Thuong_hieu_controller())->edit($id);
});

$router->add('/admin/thuong-hieu/delete/{id}', ['GET', 'POST', 'DELETE'], function ($id) {
    checkAdmin();
    return (new Thuong_hieu_controller())->delete($id);
});