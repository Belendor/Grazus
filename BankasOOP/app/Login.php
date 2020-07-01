<?php 

namespace App;

class Login {

    public function __construct(){

    }

    public static function login (){

        $data = json_decode(file_get_contents('./../db/admin.json'), 1);
        foreach($data as $arr){

            if($_POST['name'] == $arr['name']){
                if(md5($_POST["password"]) == $arr["password"]){

                    $_SESSION['login'] = 1;
                    return true;

                };
            }
            
        }
    }

    public static function logout (){

        unset( $_SESSION['login']);

        header('Location: /grazus/BankasOOP/public/login');
        die();

    }
}