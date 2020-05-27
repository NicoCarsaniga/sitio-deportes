<?php

class AuthHelper
{
    static public function checkLogged()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($_SESSION['LOGGED'])) {
            header('Location: ' . BASE_URL . 'index');
            die();
        }
    }

    //devuelve true en caso de estar loggeado
    static public function isLogged()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['LOGGED'])) {
            return true;
        } else {
            return false;
        }
    }
    static public function user()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['USER'])) {
            return $_SESSION['USER'];
        } else {
            return false;
        }
    }
}
