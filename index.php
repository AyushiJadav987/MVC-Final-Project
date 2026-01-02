<?php 

require_once "Controller/CategoryController.php";
require_once "Controller/SubCategoryController.php";

$controller = new CategoryController();
$controller1 = new SubCategoryController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'disp':
        $controller->index();
        break;

    case 'subdisp':
        $controller1->index();
        break;

    case 'add':
        $controller->add();
        break;

    case 'subadd':
        $controller1->add();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'subedit':
        $controller1->edit();
        break;

    case 'subupdate':
        $controller1->update();
        break;

    case 'delete':
        $controller->delete();
        break;

    case 'subdelete':
        $controller1->delete();
        break;

    default:
        $controller->disp();
        break;
}
?>