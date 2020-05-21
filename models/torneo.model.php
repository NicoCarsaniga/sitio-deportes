<?php

class TorneoModel
{

    //creo la conexión 
    private function  createConection()
    {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_deportes';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
        } catch (Exception $e) {
            var_dump($e);
        }
        return $pdo;
    }

    public function getItemList()
    {
        $db = $this->createConection();
        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM torneos ORDER BY torneo ASC");
        $sentencia->execute();
        $torneos = $sentencia->fetchAll(PDO::FETCH_OBJ);
     
        return $torneos;
    }

    public function getItemListById($id_deporte)
    {
        $db = $this->createConection();
        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM torneos INNER JOIN deportes ON torneos.id_deporte_fk=deportes.id_deporte WHERE id_deporte_fk=?");
        $sentencia->execute([$id_deporte]);
        $torneo = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $torneo;
    }

    public function addItem($tournament, $idSportFK, $country, $description, $img)
    {
        $db = $this->createConection();
        $sentencia = $db->prepare("INSERT INTO torneos(torneo, id_deporte_fk, pais, descripcion, imagen) VALUES(?, ?, ?, ?, ?)");
        $sentencia->execute([$tournament, $idSportFK, $country, $description, $img]);
    }

    public function getItemInfo($id_torneo)
    {
        $db = $this->createConection();
        $sentencia = $db->prepare("SELECT * FROM torneos WHERE id_torneo=?");
        $sentencia->execute([$id_torneo]);
        $infoTorneo = $sentencia->fetch(PDO::FETCH_OBJ);

        return $infoTorneo;
    }

    public function deleteItem($idItem)
    {
        $db = $this->createConection();
        $sentencia = $db->prepare("DELETE FROM torneos WHERE id_torneo=?");
        $sentencia->execute([$idItem]);
    }

    public function editItem($idItem, $tournament, $idSportFK, $country, $description, $img){

        $db= $this->createConection();

        $sentencia = $db->prepare("UPDATE torneos SET torneo=?, id_deporte_fk=?, pais=?, descripcion=?, imagen=? WHERE id_torneo=?");
        $sentencia->execute([$tournament, $idSportFK, $country, $description, $img, $idItem]);

    }
}
