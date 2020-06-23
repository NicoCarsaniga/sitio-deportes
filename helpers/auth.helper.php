<?php

class AuthHelper
{

    static public function start()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    //verifica que este loggeado, en caso de que no lo envía al home y corta la ejecución
    static public function checkLogged()
    {
        self::start();
        if (!isset($_SESSION['LOGGED'])) {
            header('Location: ' . BASE_URL . 'index');
            die();
        }
    }

    //devuelve true en caso de estar loggeado
    static public function isLogged()
    {
        self::start();
        if (isset($_SESSION['LOGGED'])) {
            return true;
        } else {
            return false;
        }
    }

    //devuelve el email de usuario loggeado
    static public function user()
    {
        self::start();
        if (isset($_SESSION['USER'])) {
            return $_SESSION['USER'];
        } else {
            return false;
        }
    }

    //asigna los valores de sesion id, email y el estado log
    static public function setSessionData($userdb)
    {
        self::start();
        $_SESSION['ID_USER'] = $userdb->id_usuario;
        $_SESSION['USER'] = $userdb->email;
        $_SESSION['LOGGED'] = true;
    }

    //destruye la sesion
    static public function logout()
    {
        self::start();
        session_destroy();
    }
}
