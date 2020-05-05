<?php

    require_once 'models/spokon.model.php';
    require_once 'views/spokon.view.php';

    class SpokonController{

        private $model;
        private $view;

        public function __construct(){

            $this->model = new SpokonModel();
            $this->view = new SpokonView();
        }

        public function ShowMain(){

            echo 'muestro index';
        }
    }
