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
        $sentencia = $db->prepare("SELECT * FROM torneos");
        $sentencia->execute();
        $torneos = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $torneos;
    }

    public function getItemListById($id_deporte)
    {
        $db = $this->createConection();
        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM torneos INNER JOIN deportes ON torneos.id_deporte_fk=deportes.id_deporte WHERE id_deporte_fk=1");
        $sentencia->execute([$id_deporte]);
        $torneo = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $torneo;
    }

    public function getCategoryList()
    {

        $db = $this->createConection();

        $sentencia = $db->prepare("SELECT * FROM deportes");
        $sentencia->execute();
        $sports = $sentencia->fetchAll(PDO::FETCH_OBJ);


        return $sports;
    }

    public function getCategoryById($id_torneo)
    {
        $db = $this->createConection();
        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM deportes WHERE id_deporte=?");
        $sentencia->execute([$id_torneo]);
        $torneo = $sentencia->fetch(PDO::FETCH_OBJ);

        return $torneo;
    }
}
