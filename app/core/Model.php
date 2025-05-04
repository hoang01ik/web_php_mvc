<?php

require_once 'app/core/Database.php';

class Model extends Database
{
    private $table;
    public function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
    }

    public function findById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $result = $this->fetchOne($sql);
        return !empty($result) ? $result : false;
    }

    public function insert($data = array())
    {
        $keys = implode(",", array_keys($data));
        $values = implode(",", array_map(function ($value) {
            return "'" . $this->conn->real_escape_string($value) . "'";
        }, array_values($data)));
        $sql = "INSERT INTO $this->table ($keys) VALUES ($values)";
        if ($this->query($sql)) {
            return $this->conn->insert_id;
        }
        return false;
    }

    public function update($data = array(), int $id)
    {
        $set = implode(",", array_map(function ($key, $value) {
            return "$key = '$value'";
        }, array_keys($data), array_values($data)));
        $sql = "UPDATE $this->table SET $set WHERE id = $id";
        if ($this->query($sql)) {
            return true;
        }
        return false;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        if ($this->query($sql)) {
            return true; // Trả về true khi xóa thành công
        }
        return false;
    }


    // Tìm một bản ghi (không phân trang)
    public function findOne($conditions = [])
    {
        $where = $this->buildWhereClause(conditions: $conditions);
        $sql = "SELECT * FROM $this->table $where LIMIT 1";
        $result = $this->fetchOne($sql);
        return $result ? $result : null;
    }

    // Tìm tất cả bản ghi
    public function findAll($conditions = [])
    {
        $where = $this->buildWhereClause($conditions);
        $sql = "SELECT * FROM $this->table $where";
        $result = $this->fetchAll($sql);
        return  $result ? $result : [];
    }

    // Tìm với phân trang
    public function findWithPagination( $page = 1, $limit = 10)
    {
        // Kiểm tra nếu page và limit là số dương
        if ($page < 1) {
            $page = 1;
        }
        if ($limit < 1) {
            $limit = 10;
        }

        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM $this->table LIMIT $offset, $limit";
        $result = $this->fetchAll($sql);
        return $result ? $result : [];
    }
    public function getCount() {
        $sql = "SELECT COUNT(*) as count FROM $this->table";
        return $this->fetchOne($sql)['count'];
    }
    private function buildWhereClause($conditions = [])
    {
        if (!is_array($conditions) || empty($conditions)) {
            return ""; // Trả về chuỗi rỗng nếu không có điều kiện hợp lệ
        }
        $where = "WHERE ";
        $whereConditions = [];
        foreach ($conditions as $key => $value) {
            $whereConditions[] = "$key = '" . $this->conn->real_escape_string($value) . "'";
        }
        $where .= implode(" AND ", $whereConditions); // Kết hợp các điều kiện WHERE
        return $where;
    }
    
}
