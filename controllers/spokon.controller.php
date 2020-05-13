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
        $categories = $this->model->getCategoryList();
        $this->view = new SpokonView($categories);
    }

    public function showMain()
    {
        //data para el main
        $itemList = $this->model->getItemList();

        $this->view->showMainView($itemList);
    }

    public function showTournament($id_torneo)
    {
        $itemListById = $this->model->getItemListById($id_torneo);
        $tournamentById = $this->model->getCategoryById($id_torneo);

        $this->view->showItemListById($itemListById, $tournamentById);
    }

    public function showItem($id_item)
    { 
        $itemInfo = $this->model->getItemInfo($id_item);

        $this->view->showItem($itemInfo);
    }

    function showError($error) {
        $this->view->showError($error); 
    }
}
