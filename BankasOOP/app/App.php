<?php

namespace App;

class App{
    public $URI = '/grazus/BankasOOP/public/';

    function __construct(){
        $this->start();
    }

    public function start (){
        session_start();


        $params = str_replace($this->URI, '', $_SERVER['REQUEST_URI']); //   /grazus/BankasOOP/public/

        $params = explode('/', $params);

        _dc($params);

        if(count($params) == 1){
            if($params[0] == 'saskaita'){
                require('./../view/saskaita.php');
            }
            if($params[0] == 'loging'){

                if(new Login()){
                    header('Location: /grazus/BankasOOP/public/saskaita');
                    die();

                }else{

                }
            }
            if($params[0] == 'login'){

                require('./../view/login.php');

            }
        }


    }
}