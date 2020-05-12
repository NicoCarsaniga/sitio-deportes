<?php

require_once('libs/Smarty.class.php');


class AdminView{

    public function adminPage($itemList, $categories){

        
        $smarty = new Smarty();

        $smarty->assign('items', $itemList);
        $smarty->assign('categories', $categories);

        $smarty->display('adminPage.tpl');


    }

}