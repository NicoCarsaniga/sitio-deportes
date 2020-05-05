<?php

require_once 'controllers/spokon.controller.php';

//defino la base de la url de forma dinámica
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
//define la acción por defecto
if (empty($_GET['action'])) {
    $_GET['action'] = 'index';
}
// toma la acción que viene del usuario y parsea los parámetros
$accion = $_GET['action'];
$parametros = explode('/', $accion);

// decide que camino tomar según TABLA DE RUTEO
switch ($parametros[0]) {
    case 'index':
        //instancio el objeto de la clase 
        $controller = new SpokonController();
        $controller->showMain();
        break; 
}