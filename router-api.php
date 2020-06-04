<?php

require_once 'libs/router/Router.php';
require_once 'api/category-api.controller.php';

// se crea el router en base a la libreria
$router = new Router();

//Crea las rutas
$router->addRoute('categories','GET','CategoryApiController','getCategories');
$router->addRoute('categories/:ID','GET','CategoryApiController','getCategory');



//es lo que rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);