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
        $sentencia = $db->prepare("SELECT * FROM torneos INNER JOIN deportes ON torneos.id_deporte_fk=deportes.id_deporte WHERE id_deporte_fk=?");
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

    public function insert($newSport) {
         
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
        $torneo = $sentencia->fetch(PDO::FETCH_OBJ);

        return $torneo;
    }
    
     public function addItem($tournament, $idSportFK, $country, $description, $img)
     {
         $db = $this->createConection();
         var_dump($tournament, $idSportFK, $country, $description, $img);
         die();
         $sentencia = $db->prepare("INSERT INTO torneos VALUES (?,?,?,?,?)");
         $sentencia->execute([$tournament], [$idSportFK], [$country], [$description], [$img]);
        }
    
        
        public function getItemInfo($id_torneo)
        {
            $db = $this->createConection();
            $sentencia = $db->prepare("SELECT * FROM torneos WHERE id_torneo=?");
            $sentencia->execute([$id_torneo]);
            $infoTorneo = $sentencia->fetch(PDO::FETCH_OBJ);
            
            return $infoTorneo;
        }
    }
