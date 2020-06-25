<?php

require_once 'conection.model.php';

class Comments extends ConectionModel
{
    /**
     * Añadido de comentario
     */
    public function addComment($comment, $itemId)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("INSERT INTO comentarios(comentario, id_torneo_fk) VALUES(?, ?)");
        $sentencia->execute([$comment, $itemId]);
        //return $db->lastInsertId();
    }

    /**
     * Elimina un comentario
     */
    public function deleteComment($idComment)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $sentencia->execute([$idComment]);
    }

    /**
     * Agrega votos
     */
    public function addVote($idComment, $vote)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("INSERT INTO comentarios(votos) WHERE id_comentario=?");
        $sentencia->execute([$vote, $idComment]);
    }

    /**
     * Devuelve todos los registros
     */
    public function getComments($itemId)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("SELECT * FROM comentarios WHERE id_torneo_fk = ?");
        $sentencia->execute([$itemId]);
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }
    
    /**
     * Devuelve un comentario
     */
    public function getComment($commentId)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("SELECT * FROM comentarios WHERE id_comentario = ?");
        $sentencia->execute([$commentId]);
        $comments = $sentencia->fetch(PDO::FETCH_OBJ);
        return $comments;
    }
}