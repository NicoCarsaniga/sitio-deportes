<?php

require_once 'models/user.model.php';

class AuthController{
    
    private $model;

    public function __construct()
    {
        $this->model = new UsersModel();
    }
    

    public function verify()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];

        $userdb = $this->model->getUser($user);

        if($userdb && password_verify($password, $userdb->contrasenia)){

            session_start();

            $_SESSION['ID_USER'] = $userdb->id_usuario;
            $_SESSION['USER']= $userdb->email;
            $_SESSION['LOGGED'] = true;
            
            header('Location:' . BASE_URL. 'adminPage');
        }
        else{

            header('Location:'.BASE_URL.'error');
        }
        
    }
}