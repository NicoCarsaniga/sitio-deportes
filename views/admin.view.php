<?php

require_once 'libs/smarty/Smarty.class.php';
require_once 'helpers/auth.helper.php';
class AdminView
{

    private $smarty;

    public function __construct($categories)
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('isLogged',  AuthHelper::isLogged());
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

    public function editView($infoItem)
    {

        $this->smarty->assign('infoItem', $infoItem);

        $this->smarty->display('editView.tpl');
    }

    public function editCategoryView($infoCategory)
    {
        $this->smarty->assign('infoCategory', $infoCategory);
        $this->smarty->display('editCategoryView.tpl');
    }
}
