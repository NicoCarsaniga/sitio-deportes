<?php

require_once 'models/category.model.php';
require_once 'models/tournament.model.php';
require_once 'api/api.view.php';

class CategoryApiController
{

    private $model;
    private $modelItem;
    private $view;
    private $data;


    public function __construct()
    {
        $this->model = new CategoryModel();
        $this->view = new APIView();
        $this->modelItem = new TournamentModel();

        $this->data = file_get_contents("php://input");
    }

    //petición de categorias
    public function getCategories($params = [])
    {

        $categories = $this->model->getCategoryList();

        $this->view->response($categories, 200);
    }

    //peticion de categorias por id
    public function getCategory($params = [])
    {

        $idCategory = $params[':ID'];
        $category = $this->model->getCategoryById($idCategory);

        if ($category) {
            $this->view->response($category, 200);
        } else {
            $this->view->response("No existe la categoría con id {$idCategory}", 404);
        }
    }

    // Elimina las categorias por ID

    public function deleteCategory($params = [])
    {
        //Traigo el ID de la categoria a eliminar
        $idCategory = $params[':ID'];
        $category = $this->model->getCategoryById($idCategory);
        $item = $this->modelItem->getItemListById($idCategory);
        //verifico que exista categoria
        if (empty($category)) {
            $this->view->response("No se encontro deporte con ID: {$idCategory}", 404);
            die();
        } else if (empty($item)) { //verifico que no tenga items asociados
            $this->model->deletecategory($idCategory); //lo borro a la puta que lo pario
            $this->view->response("Se elimino correctamente el deporte con ID: {$idCategory}", 200);
        } else {
            $this->view->response("No se puede eliminar porque hay items asociados a este ID: {$idCategory}", 200);
            die();
        }
    }
    public function getData() {
        return json_decode($this->data);
    }

    public function addCategory() {
        // devuelve el objeto JSON enviado por POST     
        $body = $this->getData();

        // inserta la tarea
        $sport = $body->deporte;
        
        
        $category_id = $this->model->insert($sport);

        if ($category_id){
            $this->view->response("Se agrego el deporte con id: {$category_id}", 200);
        }else{
            $this->view->response("El deporte no fue agregado", 500);
        }
    }
}
