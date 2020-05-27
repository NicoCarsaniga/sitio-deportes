<?php

require_once 'models/category.model.php';
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
    //pag principal y publica
    public function showMain()
    {
        //data para el main
        $itemList = $this->modelItem->getItemList();
        $top3 = $this->modelItem->getItemListByVotos();

        $this->view->showMainView($itemList, $top3);
    }
    //muestra lista de item
    public function showTournament($id_torneo)
    {
        //se podria manejar mejor desde el model con una consulta diferente
        $itemListById = $this->modelItem->getItemListById($id_torneo);
        $tournamentById = $this->modelCategory->getCategoryById($id_torneo);

        $this->view->showItemListById($itemListById, $tournamentById);
    }
    //muestra detalle de item
    public function showItem($id_item)
    {
        $itemInfo = $this->modelItem->getItemInfo($id_item);

        $this->view->showItem($itemInfo);
    }
    //pag de errores
    function showError($error)
    {
        $this->view->showError($error);
    }
}
