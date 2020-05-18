<?php

class CategoryModel
{
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

    public function getCategoryList()
    {
        $db = $this->createConection();

        $sentencia = $db->prepare("SELECT * FROM deportes");
        $sentencia->execute();
        $sports = $sentencia->fetchAll(PDO::FETCH_OBJ);


        return $sports;
    }

    public function insert($newSport)
    {

        $db = $this->createConection();

        $sentencia = $db->prepare("INSERT INTO deportes(deporte) VALUES(?)");
        $sentencia->execute([$newSport]);
    }

    public function getCategoryById($id_torneo)
    {
        $db = $this->createConection();
        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM deportes WHERE id_deporte=?");
        $sentencia->execute([$id_torneo]);
        $deporte = $sentencia->fetch(PDO::FETCH_OBJ);

        return $deporte;
    }

    public function editCategory($idCategory, $sport)
    {
        $db = $this->createConection();

        $sentencia = $db->prepare("UPDATE deportes SET deporte=? WHERE id_deporte=?");
        $sentencia->execute([$sport, $idCategory]);   
    }

}
