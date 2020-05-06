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
        $itemList = $this->model->getItemList();
        $this->view->showItemList($itemList);

        $categories = $this->model->getCategoryList();
        $this->view->showCategoryList($categories);
    }

    public function showTournament($id_torneo)
    {
        $itemListById = $this->model->getItemListById($id_torneo);
        $tournamentById = $this->model->getCategoryById($id_torneo);
        $this->view->showItemListById($itemListById, $tournamentById);
    }
}
