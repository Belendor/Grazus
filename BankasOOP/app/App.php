<?php

namespace App;
use App\Saskaita;
use App\Login;

class App{
    public $URI = '/grazus/BankasOOP/public/';

    function __construct(){
        $this->start();
    }

    public function start (){
        session_start();


        $params = str_replace($this->URI, '', $_SERVER['REQUEST_URI']); //   /grazus/BankasOOP/public/

        $params = explode('/', $params);

        if(count($params) == 1){
            if($params[0] == 'saskaita'){
                require('./../view/saskaita.php');
            }elseif($params[0] == 'loging'){

                if(Login::login()){

                    header('Location: /grazus/BankasOOP/public/saskaita');
                    die();

                }

            }elseif($params[0] == 'login'){

                require('./../view/login.php');

            }elseif($params[0] == 'add'){

                Saskaita::add();

                header('Location: /grazus/BankasOOP/public/saskaita');
                die();

            }else{ // defaul redirect 

                header('Location: /grazus/BankasOOP/public/saskaita');
                die();
            }

        }elseif(count($params) == 2){ 
            if($params[0] == 'login' && $params[1] == 'logout'){
                Login::logout();
            }
            
        }else{ // defaul redirect
            header('Location: /grazus/BankasOOP/public/saskaita');
            die();
        }
    }
}