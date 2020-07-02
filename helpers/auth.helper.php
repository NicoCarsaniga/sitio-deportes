<?php

class AuthHelper
{

    static public function start()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    /**
     *  Verifica que este loggeado, en caso de que no lo envía al home y corta la ejecución
     */
 
    static public function checkLogged()
    {
        self::start();
        if (!isset($_SESSION['LOGGED'])||$_SESSION['ROL']==0) {
            header('Location: ' . BASE_URL . 'index');
            die();
        }
    }
    /**
     * Devuelve true en caso de estar loggeado
     */
    
    static public function isLogged()
    {
        self::start();
        if (isset($_SESSION['LOGGED'])) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Devuelve el email de usuario loggeado
     */
    static public function userName()
    {
        self::start();
        if (isset($_SESSION['USER'])) {
            return $_SESSION['USER'];
        } else {
            return false;
        }
    }
    /**
     * Asigna los valores de sesion id, email y el estado log
     */
    static public function setSessionData($userdb)
    {
        self::start();
        $_SESSION['ID_USER'] = $userdb->id_usuario;
        $_SESSION['USER'] = $userdb->email;
        $_SESSION['ROL'] = $userdb->rol;
        $_SESSION['LOGGED'] = true;
    }

    /**
     *  Destruye la sesion
     */
    static public function logout()
    {
        self::start();
        session_destroy();
    }

    /**
     *  Devuelve el rol del usuario
     */
    static public function role()
    {
        self::start();
        if (isset($_SESSION['ROL'])) {
            return $_SESSION['ROL'];
        } else {
            return false;
        }
    }

    /**
     * Devuelve id de ususario
     */
    static public function userId()
    {
        self::start();
        if (isset($_SESSION['ID_USER'])) {
            return $_SESSION['ID_USER'];
        } else {
            return false;
        }
    }
}
