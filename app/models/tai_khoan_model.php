<?php

class Tai_khoan_model extends Model {
    public function __construct() {
        parent::__construct('tai_khoan');
    }

    public function getUserByUsername($username) {
        $data = ['tai_khoan' => $username];
        return $this->findOne($data);
    }
}