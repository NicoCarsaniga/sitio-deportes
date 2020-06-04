<?php

require_once 'models/category.model.php';
require_once 'api/api.view.php';

class CategoryApiController{

    private $model;
    private $view;
    

    public function __construct(){
        $this->model = new CategoryModel();
        $this->view = new APIView();
    }

    //petición de categorias
    public function getCategories($params = []){

        $categories = $this->model->getCategoryList();

        $this->view->response($categories, 200);
    }

    //peticion de categorias por id
    public function getCategory($params = []){

        $idCategory = $params[':ID'];
        $category = $this->model->getCategoryById($idCategory);

        if($category){
            $this->view->response($category, 200);
        }else{
            $this->view->response("No existe la categoría con id {$idCategory}", 404);
        }
    }
}