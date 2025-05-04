<?php

$router->add('/admin/danh-muc', ['GET', 'POST'], function () {
    checkAdmin();
    return (new Danh_muc_controller())->index();
});

$router->add('/admin/danh-muc/add', ['GET', 'POST'], function () {
    checkAdmin();
    return (new Danh_muc_controller())->add();
});

$router->add('/admin/danh-muc/edit/{id}', ['GET', 'POST'], function ($id) {
    checkAdmin();
    return (new Danh_muc_controller())->edit($id);
});

$router->add('/admin/danh-muc/delete/{id}', ['GET', 'POST', 'DELETE'], function ($id) {
    checkAdmin();
    return (new Danh_muc_controller())->delete($id);
});