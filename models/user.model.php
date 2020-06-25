<?php

require_once 'conection.model.php';
class UsersModel extends ConectionModel
{
    //obtiene un usuario
    public function getUser($user)
    {
        $db = $this->getDb();

        $sentencia = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sentencia->execute([$user]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function addUser($mail, $hash, $name, $surname){

        $db = $this->getDb();

        $sentencia = $db->prepare("INSERT INTO usuarios(email, contrasenia, nombre, apellido) VALUES(?,?,?,?)");
        $sentencia->execute([$mail, $hash, $name, $surname]);
        
    }
}
