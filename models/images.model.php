<?php

require_once 'conection.model.php';

class Images extends ConectionModel
{
    /**
     * Adición de imágenes
     */
    public function addImgs($itemId, $finalName)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("INSERT INTO imagenes(id_torneo_fk, ruta) VALUES(?, ?)");
        $sentencia->execute([$itemId, $finalName]);
    }

    /**
     * Eliminación de imágenes
     */
    public function deleteImg($itemId)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("DELETE FROM imagenes WHERE id_torneo_fk = ?");
        return $sentencia->execute([$itemId]);
    }

    /**
     * Devuelve ruta de la img
     */
    public function getImgPath($itemId)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("SELECT * FROM imagenes WHERE id_torneo_fk = ?");
        $sentencia->execute([$itemId]);
        $path = $sentencia->fetch(PDO::FETCH_OBJ);
        return $path;
    }
}
