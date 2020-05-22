<?php

class UsersModel{

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

    public function getUsers($user, $password){

        $db = $this->createConection();

        $sentencia = $db->prepare("SELECT * FROM usuarios WHERE mail = ?, contrasenia=?");
        $sentencia->execute([$user, $password]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
        
    }
}