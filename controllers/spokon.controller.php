<?php

    require_once 'models/torneo.model.php';
    require_once 'views/spokon.view.php';

    class SpokonController{

        private $model;
        private $view;

        public function __construct(){

            $this->model = new TorneoModel();
            $this->view = new SpokonView();
        }

        public function ShowMain(){
            $itemList = $this->model->getItemList();
            $this->view->showItemList($itemList);

            $categorys = $this->model->getCategoryList();
            $this->view->showCategoryList($categorys);
            
        }
        public function addCategory($parametros){

            $newSport = $_POST['newSport'];

            $this->model->insert($newSport);

            header('Location: '. BASE_URL. "index");


        }
    }
