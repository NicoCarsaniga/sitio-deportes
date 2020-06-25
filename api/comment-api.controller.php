<?php

require_once 'models/comment.model.php';
require_once 'api/api.view.php';

class CommentApiController
{
    private $model;
    private $view;


    public function __construct()
    {
        $this->model = new Comments();
        $this->view = new APIView();
    }

    /**
     * Petición de comentarios
     */
    public function getComments($params = [])
    {
        $itemId = $params = [':ID'];
        $comments = $this->model->getComments($itemId);

        $this->view->response($comments, 200);
    }

    // Elimina las comentario por ID

    public function deleteComment($params = [])
    {
        //Traigo el ID del comentario a eliminar
        $idComment = $params[':ID'];
        $comment = $this->model->getComment($idComment);
        //verifico que exista el comentario
        if (empty($comment)) {
            $this->view->response("No se encontro deporte con ID: {$idComment}", 404);
            die();
        } else if (empty($item)) { 
            $this->model->deleteComment($idComment); 
            $this->view->response("Se elimino correctamente el deporte con ID: {$idComment}", 200);
        }
    }
    /**
     *   Agregado de comentario
     */

}
