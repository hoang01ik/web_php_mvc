<?php

$router->add('/logout', ['GET', 'POST'], function () {
    return (new Auth_controller())->logout();
});

$router->add('/login', ['GET', 'POST'], function () {
    return (new Auth_controller())->login();
});

$router->add('/register', ['GET', 'POST'], function () {
    return (new Auth_controller())->register();
});

$router->add('/profile', ['GET', 'POST'], function () {
    checkLogin();
    return (new Auth_controller())->profile();
});
