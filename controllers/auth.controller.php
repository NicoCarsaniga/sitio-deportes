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


    /**
     *  Realiza la verificacion del usuario y redirige a la pag que corresponda
     */
    public function verify()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];

        $userdb = $this->model->getUser($user);
        
        if ($userdb && password_verify($password, $userdb->contrasenia)) {
            AuthHelper::SetSessionData($userdb);
            $this->redirect();
        } else {
            $this->view->showError("Usuario o contraseña incorrectos.", 'index');
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

        $email = $_POST['mail'];
        $password = $_POST['pass'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $role = $_POST['rol'];


        $userdb = $this->model->getUser($email);

        
        if(!empty($userdb)){
            $this->view->showError("Ese mail ya esta registrado", 'signIn');
            die();
        }

        //encripto el password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if (empty($email && $hash && $name && $surname)) {
            $this->view->showError("Faltan datos obligatorios", 'signIn');
            die();
        }
        $success = $this->model->addUser($email, $hash, $name, $surname, $role);


        if($success){
            $user = $this->model->getUser($email);
            AuthHelper::SetSessionData($user);
            $this->redirect();
        }


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
