<?php


$router->add('/admin/tai-khoan', ['GET', 'POST'], function () {
    checkAdmin();
    return (new Tai_khoan_controller())->index();
});

// $router->add('/admin/tai-khoan/add', ['GET', 'POST'], function () {
//     return (new Tai_khoan_controller())->add();
// });

$router->add('/admin/tai-khoan/edit/{id}', ['GET', 'POST'], function ($id) {
    checkAdmin();
    return (new Tai_khoan_controller())->edit($id);
});

$router->add('/admin/tai-khoan/delete/{id}', ['GET', 'POST', 'DELETE'], function ($id) {
    checkAdmin();
    return (new Tai_khoan_controller())->delete($id);
});