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
}