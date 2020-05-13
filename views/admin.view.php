<?php

require_once('libs/Smarty.class.php');

class AdminView{

    private $smarty;

    public function __construct()
    {
     $this->smarty = new Smarty();   
    }

    public function adminPage($itemList, $categories)
    {
        $this->smarty->assign('items', $itemList);
        $this->smarty->assign('categories', $categories);

        $this->smarty->display('adminPage.tpl');
    }

}