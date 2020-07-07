<?php
//clase padre para una conección común
class ConectionModel
{
    private $db;

    public function __construct()
    {
        $this->db = $this->createConection();
    }

    /**
     * Funcion que devuelve la coneccion
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Funcion comun para crear la conexion
     */
    private function  createConection()
    {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_deportes';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $pdo;
    }
}
