<?php

require_once('./Model/CategoryModel.php');

class CategoryController{
    private $catmodel;

    public function __construct()
    {
        $this->catmodel = new CategoryModel();
    } 

    public function index()
    {
        $data = $this->catmodel->dispAll('categories');
        $res = '';
        include './Views/category/index.php';
    }
    
    public function disp()
    {
        include './Views/common/Dashboard/index.php';
    }

    public function add()
    {
        $id = $_POST['catid'];
        if($id!='')
        {
            $data = $this->catmodel->updData("categories",$_POST);
        }
        else{
            $data = $this->catmodel->insData("categories",$_POST['name']);
        }
        header("Location: index.php?action=disp");
    }

    public function delete()
    {
        $id = $_GET['id'];
        $res = $this->catmodel->delData('categories', $id);
        header("location:index.php?action=disp");
    }

    public function edit()
    {
        $id = $_GET['id'];
        $res = $this->catmodel->editData('categories', $id);
        $data = $this->catmodel->dispAll('categories');
        include './Views/category/index.php';
    }

    
}
?>