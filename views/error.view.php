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
    public function showError($msg)
    {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('showError.tpl');
    }

    /**
     *  Errores de logeo
     */
    public function loginError($msg)
    {
        $this->smarty->assign('msg', $msg); 
        $this->smarty->display('errorLogin.tpl');
    }

    /**
     * Errores de admin
     */
    public function adminError($msg)
    {
        $this->smarty->assign('msg', $msg); 
        $this->smarty->display('errorAdmin.tpl');
    }
}