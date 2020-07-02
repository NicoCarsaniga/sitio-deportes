<?php

require_once 'libs/smarty/Smarty.class.php';

class ErrorView
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
    }

    /**
     *  Vista de errores
     */
    public function showError($msg, $page)
    {
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('page', $page);
        $this->smarty->display('showError.tpl');
    }

}