<?php


$router->add('/admin/san-pham', ['GET', 'POST'], function () {
    checkAdmin();
    return (new San_pham_controller())->index();
});

$router->add('/admin/san-pham/add', ['GET', 'POST'], function () {
    checkAdmin();
    return (new San_pham_controller())->add();
});

$router->add('/admin/san-pham/edit/{id}', ['GET', 'POST'], function ($id) {
    checkAdmin();
    return (new San_pham_controller())->edit($id);
});

$router->add('/admin/san-pham/delete/{id}', ['GET', 'POST', 'DELETE'], function ($id) {
    checkAdmin();
    return (new San_pham_controller())->delete($id);
});

$router->add('/admin/san-pham/detail', ['GET', 'POST', 'DELETE'], function () {
    checkAdmin();
    return (new San_pham_controller())->detail();
});