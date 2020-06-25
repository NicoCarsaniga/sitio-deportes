<?php

require_once 'models/user.model.php';
require_once 'views/error.view.php';
class AuthController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new UsersModel();
        $this->view = new ErrorView();
    }


    //realiza la verificacion del usuario admin y redirige a la pag de admin
    public function verify()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];

        $userdb = $this->model->getUser($user);

        if ($userdb && password_verify($password, $userdb->contrasenia)) {
            AuthHelper::SetSessionData($userdb);
            header('Location:' . BASE_URL . 'adminPage');
        } else {
            $this->view->loginError("Usuario o contraseña incorrectos.");
        }
    }

    //destruye lasesion del usuario
    public function logout()
    {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'index');
    }

    public function addNewUser(){

        $mail = $_POST['mail'];
        $password = $_POST['pass'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        //encripto el password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if (empty($mail | $hash | $name | $surname)) {
            $this->viewSpokon->showError("Faltan datos obligatorios");
            die();
        }
        $this->model->addUser($mail, $hash, $name, $surname);

        header('Location: ' . BASE_URL . "index");

    }
}
