<?php

require_once('libs/Smarty.class.php');

class AdminView{

    private $smarty;
    private $categories;

    public function __construct($categories)
    {
     $this->smarty = new Smarty();   
     $this->smarty->assign('categories',$categories);
    }

    public function adminPage($itemList)
    {
        $this->smarty->assign('items', $itemList);

        $this->smarty->display('adminPage.tpl');
    }

    public function loginAdmin()
    {
        $this->smarty->display('loginAdmin.tpl');
    }

    public function editView($infoItem){

        $this->smarty->assign('infoItem', $infoItem);

        $this->smarty->display('editView.tpl');
    }

    public function editCategoryView($infoCategory)
    {
        $this->smarty->assign('infoCategory', $infoCategory);
        $this->smarty->display('editCategoryView.tpl');
    }
}