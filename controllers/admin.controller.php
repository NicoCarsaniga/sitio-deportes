<?php

require_once 'models/torneo.model.php';
require_once 'views/admin.view.php';


class AdminController{

    private $model;
    private $view;

    public function __construct(){

        $this->model = new TorneoModel();
        $this->view = new AdminView();
    }


    public function showAdminPage(){

        $itemList = $this->model->getItemList();
        

        $categories = $this->model->getCategoryList();


        $this->view->adminPage($itemList, $categories);
        

    }
}