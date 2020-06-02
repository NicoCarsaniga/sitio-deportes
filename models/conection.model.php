<?php

class ConectionModel
{
    private $db;


    public function __construct()
    {
        $this->db = $this->createConection();
    }

    public function getDb()
    {
        return $this->db;
    }
    //funcion comun para crear la conexion
    public function  createConection()
    {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_deportes';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
            // solo en modo desarrollo
            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }
        return $pdo;
    }
}
