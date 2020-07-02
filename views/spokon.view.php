<?php

require_once 'libs/smarty/Smarty.class.php';
require_once 'helpers/auth.helper.php';

class SpokonView
{
    private $smarty;

    public function __construct($categories)
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('isLogged',  AuthHelper::isLogged());
        $this->smarty->assign('USER', AuthHelper::userName());
        $this->smarty->assign('ROL', AuthHelper::role());
        $this->smarty->assign('ID_USER', AuthHelper::role());
    }
    //muestra la lista de items
    public function showItemList($itemList)
    {
        $this->smarty->assign('itemList', $itemList);
        $this->smarty->display('showItemList.tpl');
    }
    //muestra la plantilla para la edicion de categoria
    public function addSport()
    {
        $this->smarty->display('formByCategory.tpl');
    }
    //lista de items por categoria
    public function showItemListById($itemListById, $tournamentById)
    {
        $this->smarty->assign('itemListById', $itemListById);
        $this->smarty->assign('tournamentById', $tournamentById);

        $this->smarty->display('showItemListById.tpl');
    }
    //vista de item individual
    public function showItem($infoTorneo)
    {
        $this->smarty->assign('infoTorneo', $infoTorneo);
        $this->smarty->display('showItem.tpl');
    }
    //vista principal publica
    public function showMainView($itemList, $top3)
    {
        $this->smarty->assign('itemList', $itemList);
        $this->smarty->assign('top3', $top3);
        $this->smarty->display('mainBody.tpl');
    }

    //vista de formulario
    public function showForm(){

        $this->smarty->display('signInForm.tpl');
    }
}
