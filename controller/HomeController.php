<?php

class HomeController{

    public $model;

    public function indexAction(){

        if (isset($_GET['logout'])){
            unset($_SESSION['userLogInStatus']);
        }
        if(isset($_POST['loginSubmit'])){
            $usernme =$_POST['username'];
            $password=$_POST['password'];


            $checkuserlogin=$this->model->checkUserLogin($usernme,md5($password));

            if($checkuserlogin==1){
                $_SESSION['userLogInStatus']=1;
            }
        }
        if(isset($_POST['RegisterSubmit'])){
            $usernme=$_POST['username'];
            $password=$_POST['password'];

           $this->UserRegister($usernme,md5($password));
            
            $_SESSION['RegisterSubmit']=1;
        }
        $this-> routeManger();
    }


    public function routeManger(){
        if(isset($_SESSION['userLogInStatus'])){
            return require_once('views/dashboard.php');
        }
        if(isset($_GET['register'])){
            return require_once('views/register.php');
        }
        if(isset($_GET['login'])|| isset($_GET['logout'])){
            return require_once('views/login.php');
        }
        return require_once('views/login.php');
    }
}
