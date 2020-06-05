<?php

require_once 'models/tournament.model.php';
require_once 'api/api.view.php';

class ItemApiController{

    private $model;
    private $view;

    public function __construct(){
        $this->model = new TournamentModel();
        $this->view = new APIView();
    }

    //pide los items
    public function getItems($params = []){
        
        $items = $this->model->getItemList();

        $this->view->response($items, 200);
    }
}