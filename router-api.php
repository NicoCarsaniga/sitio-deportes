<?php

require_once 'libs/router/Router.php';
require_once 'api/comment-api.controller.php';

// se crea el router en base a la libreria
$router = new Router();

//Crea las rutas para los comentarios
$router->addRoute('comments/:ID', 'GET', 'CommentApiController', 'getComments');
$router->addRoute('comments/:ID', 'DELETE', 'CommentApiController', 'deleteComment');
$router->addRoute('comments/:ID', 'POST', 'CommentApiController', 'addComment');

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
