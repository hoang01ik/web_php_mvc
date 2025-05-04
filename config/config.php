<?php

define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "ch");


// ENUM('đang chờ', 'đã xác nhận', 'đã vận chuyển', 'đã giao', 'đã hủy') DEFAULT 'đang chờ'

$status_order = [
    0 => 'đang chờ',
    1 => 'đã xác nhận',
    2 => 'đã vận chuyển',
    3 => 'đã giao',
    4 => 'đã hủy'
];
// STATUS_ORDER
define('STATUS_ORDER', $status_order);