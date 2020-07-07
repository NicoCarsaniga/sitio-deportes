<?php

require_once 'conection.model.php';
class CategoryModel extends ConectionModel
{
    /**
     * devuelve la lista de categorias
     */
    public function getCategoryList()
    {
        $db = $this->getDb();

        $sentencia = $db->prepare("SELECT * FROM deportes ORDER BY deporte ASC");
        $sentencia->execute();
        $sports = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $sports;
    }

    /**
     * Inserta nueva categoria
     */
    public function insert($newSport)
    {
        $db = $this->getDb();

        $sentencia = $db->prepare("INSERT INTO deportes(deporte) VALUES(?)");
        $sentencia->execute([$newSport]);
    }

    /**
     * Devuelve categoria por id
     */
    public function getCategoryById($id_deporte)
    {
        $db = $this->getDb();
        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM deportes WHERE id_deporte=?");
        $sentencia->execute([$id_deporte]);
        $deporte = $sentencia->fetch(PDO::FETCH_OBJ);

        return $deporte;
    }

    /**
     * Funcion para editar categorias
     */
    public function editCategory($idCategory, $sport)
    {
        $db = $this->getDb();

        $sentencia = $db->prepare("UPDATE deportes SET deporte=? WHERE id_deporte=?");
        $sentencia->execute([$sport, $idCategory]);
    }

    /**
     * Funcion para eliminar una categoria
     */
    public function deleteCategory($idCategory)
    {
        $db = $this->getDb();

        $sentencia = $db->prepare("DELETE FROM deportes WHERE id_deporte=?");
        $sentencia->execute([$idCategory]);
    }
}
