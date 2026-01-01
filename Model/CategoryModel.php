<?php

require_once './config/Database.php';

class CategoryModel
{
    public function __construct()
    {
        $this->conn = Database::connect();
    }
    public function dispAll($table)
    {
        return $this->conn->query("SELECT * from $table");
    }
    public function insData($tbl, $name)
    {
        return $this->conn->query("INSERT INTO $tbl(`catid`,`name`) VALUES('','$name')");
    }
    public function delData($tbl, $id)
    {
        return $this->conn->query("DELETE FROM $tbl where catid = ".$id);
    }
    public function editData($tbl, $id)
    {
        return $this->conn->query("SELECT * FROM $tbl where catid =" .$id);
    }
    public function updData($tbl , $data)
    {
        return $this->conn->query("UPDATE $tbl set `name`='$data[name]' where catid=".$data['catid']);
    }
}


?>