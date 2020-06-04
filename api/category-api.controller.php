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

    public function getCategories($params = []){

        $category = $this->model->getCategoryList();

        $this->view->response($category, 200);
    }
}