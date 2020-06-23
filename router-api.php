<?php

require_once 'libs/router/Router.php';
require_once 'api/category-api.controller.php';
require_once 'api/item-api.controller.php';

// se crea el router en base a la libreria
$router = new Router();

//Crea las rutas para las categorias
$router->addRoute('categories','GET','CategoryApiController','getCategories');
$router->addRoute('categories/:ID','GET','CategoryApiController','getCategory');
$router->addRoute('categories/:ID','DELETE','CategoryApiController','deleteCategory');
//$router->addRoute('categories','POST','CategoryApiController','addCategory');

//Crea las rutas para los items
$router->addRoute('items','GET','ItemApiController','getItems');



//es lo que rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);