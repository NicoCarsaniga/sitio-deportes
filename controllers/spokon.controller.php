<?php

require_once 'models/torneo.model.php';
require_once 'views/spokon.view.php';

class SpokonController
{

    private $model;
    private $view;

    public function __construct()
    {

        $this->model = new TorneoModel();
        $this->view = new SpokonView();
    }

    public function showMain()
    {
        //data para el main
        $itemList = $this->model->getItemList();
        $categories = $this->model->getCategoryList();


        $this->view->showMainView($itemList, $categories);

    }




    public function addCategory()
    {

        $newSport = $_POST['newSport'];

        //var_dump($newSport);
        //die();

        $this->model->insert($newSport);

        header('Location: ' . BASE_URL . "index");
    }



    public function showTournament($id_torneo)
    {
        $categories = $this->model->getCategoryList();
        $itemListById = $this->model->getItemListById($id_torneo);
        $tournamentById = $this->model->getCategoryById($id_torneo);


        $this->view->showItemListById($categories, $itemListById, $tournamentById);
    }


    public function showItem($id_item)
    {        
        $categories = $this->model->getCategoryList();
        $itemInfo = $this->model->getItemInfo($id_item);

        $this->view->showItem($categories, $itemInfo);

    }
}
