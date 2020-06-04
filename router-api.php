<?php

require_once 'libs/router/Router.php';
require_once 'api/category-api.controller.php';

// se crea el router en base a la libreria
$router = new Router();

//Crea las rutas
$router->addRoute('category','GET','CategoryApiController','getCategories');


$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);