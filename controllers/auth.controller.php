<?php

require_once 'models/user.model.php';

class AuthController
{

    private $model;

    public function __construct()
    {
        $this->model = new UsersModel();
    }


    //realiza la verificacion del usuario admin y redirige a la pag de admin
    public function verify()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];

        $userdb = $this->model->getUser($user);

        if ($userdb && password_verify($password, $userdb->contrasenia)) {
            AuthHelper::verify($userdb);
            header('Location:' . BASE_URL . 'adminPage');
        } else {
            header('Location:' . BASE_URL . 'error');
        }
    }

    //destruye lasesion del usuario
    public function logout()
    {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'index');
    }
}
