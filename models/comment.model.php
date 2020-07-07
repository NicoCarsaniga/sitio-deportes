<?php

require_once 'conection.model.php';

class Comments extends ConectionModel
{
    /**
     * Añadido de comentario
     */
    public function addComment($comment, $itemId, $vote, $userId)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("INSERT INTO comentarios(comentario, id_torneo_fk, votos, id_usuario_fk) VALUES(?, ?, ?, ?)");
        $sentencia->execute([$comment, $itemId, $vote, $userId]);
        return $db->lastInsertId();
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
     * Devuelve todos los registros de la tabla comentarios y los usuarios asociados
     */
    public function getComments($itemId)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("SELECT comentarios.id_comentario, comentarios.comentario, comentarios.votos, usuarios.email FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario_fk=usuarios.id_usuario WHERE id_torneo_fk=?");
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
        $sentencia = $db->prepare("SELECT * FROM comentarios WHERE id_comentario=?");
        $sentencia->execute([$commentId]);
        $comments = $sentencia->fetch(PDO::FETCH_OBJ);
        return $comments;
    }
}
