<?php

require_once 'models/torneo.model.php';
require_once 'models/category.model.php';
require_once 'views/admin.view.php';
require_once 'views/spokon.view.php';

class AdminController{

    private $modelItem;
    private $modelCategory;
    private $view;
    private $viewSpokon;

    public function __construct(){

        $this->modelItem = new TorneoModel();
        $this->modelCategory = new CategoryModel ();
        $categories = $this->modelCategory->getCategoryList();
        $this->view = new AdminView($categories);
        $this->viewSpokon = new SpokonView($categories);
    }


    public function showAdminPage(){

        $itemList = $this->modelItem->getItemList();

        $this->view->adminPage($itemList);
    }

    public function addCategory()
    {
        $newSport = $_POST['newSport'];
        if(empty($newSport)){
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }
        $this->modelCategory->insert($newSport);

        header('Location: ' . BASE_URL . "adminPage");
    }

    public function addItem()
    {
        $tournament = $_POST['tournament'];
        $idSportFK = $_POST['idSportFK'];
        $country = $_POST['country'];
        $description = $_POST['description'];
        $img = $_POST['img'];

        if(empty($tournament | $idSportFK | $country | $description | $img)){
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }

        $this->modelItem->addItem($tournament, $idSportFK, $country, $description, $img);

        header('Location: ' . BASE_URL . "adminPage");
    }

    public function loginAdmin()
    {
        $this->view->loginAdmin();
    }

    public function verifyAdmin()
    {
        $adminUser = $_POST['adminUser'];
        $adminPassword = $_POST['password'];
        
        if($adminUser == 'adminuser@admin.com' & $adminPassword == 'abc1234'){
            
            $this->showAdminPage();
        }
    }

    public function deleteItem($idItem)
    {
        $success = $this->modelItem->deleteItem($idItem);

        header('Location: ' . BASE_URL . "adminPage");
    }

    public function editView($idItem){


        $infoItem = $this->modelItem->getItemInfo($idItem);
        $categories = $this->modelCategory->getCategoryList();
        
        $this->view->editView($infoItem, $categories);

    }

    public function confirmEdition(){

        $idItem = $_POST['idItem'];
        $tournament = $_POST['tournament'];
        $idSportFK = $_POST['idSportFK'];
        $country = $_POST['country'];
        $description = $_POST['description'];
        $img = $_POST['img'];

        if(empty($tournament || $idSportFK || $country || $description || $img)){
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }

        $this->modelItem->editItem($idItem, $tournament, $idSportFK, $country, $description, $img);

        header('Location: ' . BASE_URL . "adminPage");
    }
    
    public function editViewCategory($idCategory)
    {
        $infoCategory = $this->modelCategory->getCategoryById($idCategory);
        $this->view->editCategoryView($infoCategory);
    }

    public function confirmEditCat()
    {
        $idCategory = $_POST['idCategory'];
        $sport = $_POST['sport'];
        if(empty($sport)){
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }
        $this->modelCategory->editCategory($idCategory, $sport);

        header('Location: ' . BASE_URL . "adminPage");
    }

    public function deleteCategory($idCategory){

        $itemList = $this->modelItem->getItemListById($idCategory);

        if(!empty($itemList)){
            $this->viewSpokon->showError("Elmine los torneos asociados a este deporte");
            die();
        }
        else{
            $this->modelCategory->deleteCategory($idCategory);
        }

        header('Location: ' . BASE_URL . "adminPage");
    }

}