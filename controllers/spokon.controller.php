<?php

require_once 'models/torneo.model.php';
require_once 'views/spokon.view.php';

class SpokonController
{
    private $modelCategory;
    private $modelItem;
    private $view;

    public function __construct()
    {
        $this->modelItem = new TorneoModel();
        $this->modelCategory = new CategoryModel();
        $categories = $this->modelCategory->getCategoryList();
        $this->view = new SpokonView($categories);
    }

    public function showMain()
    {
        //data para el main
        $itemList = $this->modelItem->getItemList();

        $this->view->showMainView($itemList);
    }

    public function showTournament($id_torneo)
    {
        $itemListById = $this->modelItem->getItemListById($id_torneo);
        $tournamentById = $this->modelCategory->getCategoryById($id_torneo);

        $this->view->showItemListById($itemListById, $tournamentById);
    }

    public function showItem($id_item)
    { 
        $itemInfo = $this->modelItem->getItemInfo($id_item);

        $this->view->showItem($itemInfo);
    }

    function showError($error) {
        $this->view->showError($error); 
    }
}
