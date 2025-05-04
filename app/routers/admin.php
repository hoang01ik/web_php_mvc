<?php

$router->add('/admin', ['GET', 'POST'], function () {
    return (new Admin_controller())->index();
});

$router->add('/admin/dashboard', ['GET', 'POST'], function () {
    checkAdmin();
    return (new Admin_controller())->dashboard();
});


$router->add('/admin/profile', ['GET', 'POST'], function () {
    checkAdmin();
    return (new Admin_controller())->profile();
});
