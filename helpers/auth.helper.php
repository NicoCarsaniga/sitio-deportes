<?php

class AuthHelper
{
    static public function checkLogged()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

}
