<?php

require_once 'controllers/spokon.controller.php';

//defino la base de la url de forma dinámica
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
//define la acción por defecto
if (empty($_GET['action'])) {
    $_GET['action'] = 'index';
}
// toma la acción que viene del usuario y parsea los parámetros
$action = $_GET['action'];
$parametros = explode('/', $action);

// decide que camino tomar según TABLA DE RUTEO
switch ($parametros[0]) {
    case 'index':
        //instancio el objeto de la clase 
        $controller = new SpokonController();
        $controller->showMain();
        break;
    case 'addCategory':
        $controller = new SpokonController();
        $controller->addCategory();
        break;

    case 'tournament':
        $controller = new SpokonController();
        $controller->showTournament($parametros[1]);
    break;
}
