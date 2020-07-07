<?php

require_once 'libs/smarty/Smarty.class.php';
require_once 'helpers/auth.helper.php';
class AdminView
{
    private $smarty;

    public function __construct($categories, $itemList)
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('itemList', $itemList);
        $this->smarty->assign('isLogged',  AuthHelper::isLogged());
        $this->smarty->assign('USER', AuthHelper::userName());
        $this->smarty->assign('ROL', AuthHelper::role());
        $this->smarty->assign('ID_USER', AuthHelper::userId());
    }

    /**
     * Pag principal de los admin
     */
    public function adminPage()
    {
        $this->smarty->display('adminPage.tpl');
    }

    /**
     *  Vista de edición de item
     */
    public function editView($infoItem, $img)
    {
        $this->smarty->assign('infoItem', $infoItem);
        $this->smarty->assign('img', $img);
        $this->smarty->display('editView.tpl');
    }

    /**
     * Vista de edición de categoría
     */
    public function editCategoryView($infoCategory)
    {
        $this->smarty->assign('infoCategory', $infoCategory);
        $this->smarty->display('editCategoryView.tpl');
    }

    /**
     *  Vista de usuarios y admin
     */
    public function usersList($users)
    {
        $this->smarty->assign('users', $users);
        $this->smarty->display('editUser.tpl');
    }
}
