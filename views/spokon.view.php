<?php

require_once('libs/Smarty.class.php');
require_once 'helpers/auth.helper.php';

class SpokonView
{
    private $smarty;

    public function __construct($categories)
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('categories', $categories);
        AuthHelper::checkLogged();
        if (isset($_SESSION["LOGGED"])) {
            $this->smarty->assign('isLogged', $_SESSION["LOGGED"]);
        } else {
            $this->smarty->assign('isLogged', false);
        }
        if(isset($_SESSION["USER"])){
        $this->smarty->assign('USER', $_SESSION["USER"]);
        }
    }

    public function showItemList($itemList)
    {
        $this->smarty->assign('itemList', $itemList);
        $this->smarty->display('showItemList.tpl');
    }

    public function addSport()
    {
        $this->smarty->display('formByCategory.tpl');
    }

    public function showItemListById($itemListById, $tournamentById)
    {
        $this->smarty->assign('itemListById', $itemListById);
        $this->smarty->assign('tournamentById', $tournamentById);

        $this->smarty->display('showItemListById.tpl');
    }

    public function showItem($infoTorneo)
    {
        $this->smarty->assign('infoTorneo', $infoTorneo);

        $this->smarty->display('showItem.tpl');
    }

    public function showMainView($itemList)
    {
        $this->smarty->assign('itemList', $itemList);

        $this->smarty->display('mainBody.tpl');
    }

    public function showError($msg)
    {
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('msg', $msg);

        $this->smarty->display('showError.tpl');
    }
}
