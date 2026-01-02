<?php

require_once('./Model/SubCategoryModel.php');
require_once('./Model/CategoryModel.php');


class SubCategoryController 
{
    private $subcatmodel;
    private $catmodel;

    public function __construct()
    {
        $this->subcatmodel = new SubCategoryModel();
        $this->catmodel = new CategoryModel();
        
    } 

    public function index()
    {
        $catdata = $this->catmodel->dispAll('categories');
        $res = $this->subcatmodel->dispCatWiseData();
        $data = $this->subcatmodel->dispAll('sub_category');
        include './Views/subcategory/index.php';
    }
    
  
    // public function disp()
    // {
    //     include './Views/common/Dashboard/index.php';
    // }

    public function add()
    {
        $data =  $this->subcatmodel->insData("sub_category", $_POST['catid'], $_POST['subcat_name']);
        header("Location:index.php?action=subdisp"); 
    }

    public function delete()
    {
        $id = $_GET['id'];
        $res = $this->subcatmodel->delData("sub_category", $id);
        
        header("Location: index.php?action=subdisp"); 
        
    }

    public function edit()
    {

        $id = $_GET['id'];
        $data = $this->subcatmodel->editData('sub_category', $id);
        $res1 = mysqli_fetch_assoc($data);  

        $catdata = $this->catmodel->dispAll('categories');
         $res = $this->subcatmodel->dispCatWiseData();
        $data = $this->subcatmodel->dispAll('sub_category');
       
        include './Views/subcategory/index.php';
    }

    public function update()
{
    if (isset($_POST['subcatid'])) 
    {
        $this->subcatmodel->updData('sub_category', $_POST);
        header("Location: index.php?action=subdisp");
        exit;
    }
}



   
}
?>