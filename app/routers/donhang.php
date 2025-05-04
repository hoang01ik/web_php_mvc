<?php


$router->add('/admin/don-hang', ['GET', 'POST'], function () {
    checkAdmin();
    return (new Donhang_controller())->index();
});