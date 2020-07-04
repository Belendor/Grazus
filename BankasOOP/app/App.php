<?php

namespace App;
use App\Saskaita;
use App\Login;

class App{

    public $URI = '/grazus/BankasOOP/public/';

    public static $user = '';

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

            }elseif($params[0] == 'sarasas'){

                require('./../view/sarasas.php');

            }else{ // defaul redirect 

                header('Location: /grazus/BankasOOP/public/login');
                die();

            }

        }elseif(count($params) == 2){ 
            if($params[0] == 'login' && $params[1] == 'logout'){
                Login::logout();
            }

            if($params[0] == 'delete'){

                Saskaita::remove($params[1]);

                header('Location: /grazus/BankasOOP/public/sarasas');
                die();
            }

            if($params[0] == 'add'){

                if(!empty($_POST)){

                    Saskaita::sum();

                    header('Location: /grazus/BankasOOP/public/add/'.$params[1]);
                    die();

                }else{
                    App::$user = $params[1];
    
                    require('./../view/prideti.php');
                }
            }

            if($params[0] == 'change'){

                if(!empty($_POST)){

                    Change::convert($params[1]);

                    header('Location: /grazus/BankasOOP/public/change/'.$params[1]);
                    die();

                }else{

                    App::$user = $params[1];
                    require('./../view/keisti.php');

                }
            }

            if($params[0] == 'minus'){

                if(!empty($_POST)){

                    Saskaita::minus();

                    header('Location: /grazus/BankasOOP/public/minus/'.$params[1]);
                    die();

                }else{
                    App::$user = $params[1];
    
                    require('./../view/atimti.php');
                }
            }
            
        }else{ // defaul redirect

        }
    }
}