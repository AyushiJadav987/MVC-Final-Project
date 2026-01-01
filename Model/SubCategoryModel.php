<?php

require_once './config/Database.php';

class SubCategoryModel
{
    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function dispAll($table)
    {
        return $this->conn->query("SELECT * FROM $table");
    }

    public function insData($tbl, $cid, $name)
    {
        return $this->conn->query("INSERT INTO $tbl(`subcatid`,`catid`, `subcat_name`) VALUES('', '$cid', '$name')");
    }

    public function delData($tbl, $id)
    {
        return $this->conn->query("DELETE FROM $tbl where subcatid = ".$id);
    }

    public function editData($tbl, $id)
    {
        return $this->conn->query("SELECT * FROM $tbl where subcatid = ".$id);
    }
    
    public function updData($tbl , $data)
    {
        return $this->conn->query("UPDATE $tbl set `subcat_name`='$data[subcat_name]' where subcatid=".$data['subcatid']);
    }

    public function dispCatWiseData()
    {
        return $this->conn->query("SELECT sub_category.subcatid,  sub_category.subcat_name, categories.name 
        FROM sub_category JOIN categories ON sub_category.catid = categories.catid");
    }
}
?>


