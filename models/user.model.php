<?php

require_once 'conection.model.php';
class UsersModel extends ConectionModel
{
    /**
     * Obtiene un usuario
     */
    public function getUser($user)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sentencia->execute([$user]);
        $user = $sentencia->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    /**
     *  Devuelve todos los usuarios
     */
    public function getUsers()
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        $users = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }

    /**
     * Agrega un nuevo usuario
     */
    public function addUser($mail, $hash, $name, $surname, $role)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("INSERT INTO usuarios(email, contrasenia, nombre, apellido, rol) VALUES(?,?,?,?,?)");
        $success = $sentencia->execute([$mail, $hash, $name, $surname, $role]);

        return ($success);
    }

    /**
     * Edita el rol del usuario para hacerlo admin
     */
    public function editUserRole($userID)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("UPDATE usuarios SET rol=? WHERE id_usuario=?");
        $sentencia->execute([1, $userID]);
    }

    /**
     * Elimina un usuario
     */
    public function delete($userID)
    {
        $db = $this->getDb();
        $sentencia = $db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
        $sentencia->execute([$userID]);
    }
}
