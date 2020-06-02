<?php

require_once 'conection.model.php';
class TournamentModel extends ConectionModel
{
    //trae de la db lista de items ordenada por votos descendente
    public function getItemList()
    {
        $db = $this->getDb();
        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM torneos ORDER BY votos DESC");
        $sentencia->execute();
        $torneos = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $torneos;
    }

    public function getItemListByVotos()
    {
        $db = $this->getDb();
        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM torneos ORDER BY votos DESC LIMIT 3");
        $sentencia->execute();
        $torneos = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $torneos;
    }

    //obtiene toda la info de las tablas de items y categorias segun id_cat
    public function getItemListById($id_deporte)
    {
        $db = $this->getDb();
        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM torneos INNER JOIN deportes ON torneos.id_deporte_fk=deportes.id_deporte WHERE id_deporte_fk=?");
        $sentencia->execute([$id_deporte]);
        $torneo = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $torneo;
    }

    //agrega item en db
    public function addItem($tournament, $idSportFK, $country, $description, $img)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("INSERT INTO torneos(torneo, id_deporte_fk, pais, descripcion, imagen) VALUES(?, ?, ?, ?, ?)");
        $sentencia->execute([$tournament, $idSportFK, $country, $description, $img]);
    }
    //obtiene toda la info de las tablas de items y categorias segun id_cat
    public function getItemInfo($id_torneo)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("SELECT * FROM torneos INNER JOIN deportes ON torneos.id_deporte_fk = deportes.id_deporte WHERE id_torneo=?");
        $sentencia->execute([$id_torneo]);
        $infoTorneo = $sentencia->fetch(PDO::FETCH_OBJ);

        return $infoTorneo;
    }
    //borrado de item
    public function deleteItem($idItem)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("DELETE FROM torneos WHERE id_torneo=?");
        $sentencia->execute([$idItem]);
    }
    //edicion de item
    public function editItem($idItem, $tournament, $idSportFK, $country, $description, $img)
    {

        $db = $this->getDb();

        $sentencia = $db->prepare("UPDATE torneos SET torneo=?, id_deporte_fk=?, pais=?, descripcion=?, imagen=? WHERE id_torneo=?");
        $sentencia->execute([$tournament, $idSportFK, $country, $description, $img, $idItem]);
    }
}
