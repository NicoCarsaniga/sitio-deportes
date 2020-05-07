<?php

    class TorneoModel {

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

    public function getCategoryList(){

        $db = $this->createConection();

        $sentencia = $db->prepare("SELECT * FROM deportes");
        $sentencia->execute();
        $sports = $sentencia->fetchAll(PDO::FETCH_OBJ);


        return $sports;

    }

    public function insert($newSport) {
         
        $db = $this->createConection();

        
        $sentencia = $db->prepare("INSERT INTO deportes(deporte) VALUES(?)");
        $sentencia->execute([$newSport]);
    }

    }