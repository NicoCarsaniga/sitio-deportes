<?php

require_once 'models/torneo.model.php';
require_once 'views/admin.view.php';
require_once 'views/spokon.view.php';

class AdminController{

    private $model;
    private $view;
    private $viewSpokon;

    public function __construct(){

        $this->model = new TorneoModel();
        $categories = $this->model->getCategoryList();
        $this->view = new AdminView();
        $this->viewSpokon = new SpokonView($categories);
    }


    public function showAdminPage(){

        $itemList = $this->model->getItemList();
        $categories = $this->model->getCategoryList();

        $this->view->adminPage($itemList, $categories);
    }

    public function addCategory()
    {
        $newSport = $_POST['newSport'];
        if(empty($newSport)){
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }
        $this->model->insert($newSport);

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

        $this->model->addItem($tournament, $idSportFK, $country, $description, $img);

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
        $success = $this->model->deleteItem($idItem);

        header('Location: ' . BASE_URL . "adminPage");
    }

    public function editView($idItem){


        $infoItem = $this->model->getItemInfo($idItem);
        $categories = $this->model->getCategoryList();
        
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

        $this->model->editItem($idItem, $tournament, $idSportFK, $country, $description, $img);

        header('Location: ' . BASE_URL . "adminPage");
    }
}