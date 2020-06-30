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
            $this->redirect();
        } else {
            $this->view->showError("Usuario o contraseña incorrectos.", 'adminPage');
        }
    }
    /**
     * Destruye la sesion del usuario
     */
    public function logout()
    {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'index');
    }

    /**
     * Agrega un nuevo usuario
     */
    public function addNewUser()
    {

        $mail = $_POST['mail'];
        $password = $_POST['pass'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        //encripto el password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if (empty($mail && $hash && $name && $surname)) {
            $this->view->showError("Faltan datos obligatorios", 'adminPage');
            die();
        }
        $this->model->addUser($mail, $hash, $name, $surname);

        header('Location: ' . BASE_URL . "index");
    }

    public function redirect()
    {   
        if($_SESSION['ROL'])
            header('Location:' . BASE_URL . 'adminPage');
            else
            header('Location:' . BASE_URL . 'index');
    }
}
