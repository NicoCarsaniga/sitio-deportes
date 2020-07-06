<?php

require_once 'models/category.model.php';
require_once 'models/tournament.model.php';
require_once 'models/images.model.php';
require_once 'views/spokon.view.php';
require_once 'views/error.view.php';

class SpokonController
{
    private $modelCategory;
    private $modelItem;
    private $modelImg;
    private $view;
    private $viewError;

    public function __construct()
    {
        $this->modelItem = new TournamentModel();
        $this->modelCategory = new CategoryModel();
        $this->modelImg = new Images();
        $categories = $this->modelCategory->getCategoryList();
        $this->view = new SpokonView($categories);
        $this->viewError = new ErrorView();
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
        $itemListById = $this->modelItem->getItemListById($id_torneo);
        $tournamentById = $this->modelCategory->getCategoryById($id_torneo);

        $this->view->showItemListById($itemListById, $tournamentById);
    }
    //muestra detalle de item
    public function showItem($id_item)
    {
        $itemInfo = $this->modelItem->getItemInfo($id_item);
        $img =  $this->modelImg->getImgPath($id_item);
        
        if($img){//si no tiene img cargada muestra una por default
            $imgPath = $img->ruta;
        }else{
            $imgPath = 'img/default-image.png';
        }
        $this->view->showItem($itemInfo, $imgPath);
    }
    //pag de errores
    function showError($error, $page)
    {
        $this->viewError->showError($error, $page);
    }

    /**
     * muestra formulario para inscripcion
     */
    public function signIn(){

        $this->view->showForm();
    }

}
