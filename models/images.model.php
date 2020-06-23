<?php

require_once 'conection.model.php';

class Images extends ConectionModel
{
    /**
     * toma la/las img en carpeta temporal y la/las mueve a su ubicación final
     * devuelve ubicación final
     */

    public function moveImg()
    {
        if ($_FILES["img"]["name"]) {
            // Nombre archivo original
            $originalName = $_FILES['img']['name'];
            //nombre temporal
            $source = $_FILES["img"]["tmp_name"];
            // Nombre en el file system:
        }
        
        $finalName = "img/" . uniqid("", true) . "." . strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        move_uploaded_file($source, $finalName);
        return $finalName;
    }
    /**
     * Adición de imágenes
     */
    public function addImgs($itemId)
    {
        $finalName = $this->moveImg();
        $db = $this->getDb();
        $sentencia = $db->prepare("INSERT INTO imagenes(id_torneo_fk, ruta) VALUES(?, ?)");
        $sentencia->execute([$itemId, $finalName]);
    }
}
