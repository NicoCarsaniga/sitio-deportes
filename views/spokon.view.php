<?php

require_once('libs/Smarty.class.php');

class SpokonView
{

    public function showItemList($itemList)
    {

        $smarty = new Smarty();

        $smarty->assign('itemList', $itemList);

        $smarty->display('showItemList.tpl');
    }
    

    public function addSport()
    {
        $smarty = new Smarty();

        $smarty->display('formByCategory.tpl');
    }


    public function showItemListById($categories, $itemListById, $tournamentById)
    {

        $smarty = new Smarty();

        $smarty->assign('categories', $categories);
        $smarty->assign('itemListById', $itemListById);
        $smarty->assign('tournamentById', $tournamentById);

        $smarty->display('showItemListById.tpl');
    }

    public function showItem($categories, $infoTorneo)
    {
        $smarty = new Smarty();

        $smarty->assign('categories', $categories);
        $smarty->assign('infoTorneo', $infoTorneo);

        $smarty->display('showItem.tpl');
    }

    public function showMainView($itemList, $categories)
    {
        $smarty = new Smarty();

        $smarty->assign('itemList', $itemList);
        $smarty->assign('categories', $categories);

        $smarty->display('mainBody.tpl');
    }

    
}
