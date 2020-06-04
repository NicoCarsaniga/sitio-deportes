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
}
