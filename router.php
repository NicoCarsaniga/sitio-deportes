<?php

require_once 'controllers/spokon.controller.php';
require_once 'controllers/admin.controller.php';
require_once 'controllers/auth.controller.php';

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
        $controller = new AdminController();
        $controller->addCategory();
        break;

    case 'tournament':
        $controller = new SpokonController();
        $controller->showTournament($parametros[1]);
        break;

    case 'item':
        $controller = new SpokonController();
        $controller->showItem($parametros[1]);
        break;

    case 'adminPage':
        $controller = new AdminController();
        $controller->showAdminPage();
        break;
    
    case 'addItem':
        $controller = new AdminController();
        $controller->addItem();
        break;

    case 'verify':
        $controller = new AuthController();
        $controller->verify();
        break;

    case 'delete':
        $controller = new AdminController();
        $controller->deleteItem($parametros[1]);
        break;

    case 'editView':
        $controller = new AdminController();
        $controller->editView($parametros[1]);
        break;
    
    case 'edit':
        $controller = new AdminController();
        $controller->confirmEdition();
        break;
    
    case 'editViewCategory':
        $controller = new AdminController();
        $controller->editViewCategory($parametros[1]);
        break;

    case 'editCat':
        $controller = new AdminController();
        $controller->confirmEditCat();
        break;

    case 'deleteSport':
        $controller = new AdminController();
        $controller->deleteCategory($parametros[1]);
        break;

    case "logout": 
        $controller = new AuthController();
        $controller->logout();
        break;

    case "signIn":
        $controller = new SpokonController();
        $controller->signIn();
        break;
    
    case "signNewUser":
        $controller = new AuthController();
        $controller->addNewUser();
        break;

    case "users":
        $controller = new AdminController();
        $controller->getUsers();
        break;

    case "editRole":
        $controller = new AdminController();
        $controller->editUserRole($parametros[1]);
        break;
    
    case "deleteUser":
        $controller = new AdminController();
        $controller->deleteUser($parametros[1]);
        break;

    default:
        $controller = new SpokonController();
        $controller->showError("404 not found",'index');
        break;
}
