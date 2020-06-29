<?php 

namespace App;

class Login {

    public $loged = false;

    public function __construct(){
        $this->login();
    }

    public function login (){

        $data = json_decode(file_get_contents(__DIR__ .'/admin.json'),1);
        foreach($data as $arr){

            if($_POST['name'] == $arr['name']){
                if(md5($_POST["password"]) == $arr["password"]){
                    $_SESSION['login'] = 1;

                    return true;

                };
            }
        }
    }
}