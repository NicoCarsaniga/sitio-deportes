<?php

require_once 'conection.model.php';
class UsersModel extends ConectionModel
{
    public function getUser($user)
    {

        $db = $this->getDb();

        $sentencia = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sentencia->execute([$user]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}
