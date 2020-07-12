<?php
namespace App;

use App\DB\Duomenys;

class Saskaita {

    public static function add(){

        if(!empty($_POST) && self::validateId()){
    
            $newObject = [
                'firstname'=> $_POST['name'],
                'lastname' => $_POST['surename'],
                'account' => $_POST['account'],
                'id' => $_POST['id'],
                'eur' => 0,
                'usd' => 0
            ];

            $duomenys = new Duomenys();
            $duomenys->create($newObject);

        }
    }
    public static function validateId(){
        $duomenys = new Duomenys;
        $data = $duomenys->showAll();

        foreach($data as $value){

            if($value['id'] == $_POST['id']){
            
                $uniqueId = false;

                $_SESSION['note'] = [
                    "message" => "error",
                    "text" => "Saskaita: ".$_POST['id']." jau egzistuoja!"
                ];

            }
        }

        return true;
    }
    public static function remove($id){

        $duomenys = new Duomenys;
        $user = $duomenys->show($id);

        if($user['usd'] > 0 || $user['eur'] > 0){

            $_SESSION['note'] = [
                "message" => "error",
                "text" => 'Saskaita nera tuscia!'
            ];

        }else{

            $_SESSION['note'] = [
                "message" => "message",
                "text" => "Saskaita: $id istrinta sekmingai!"
            ];

            $duomenys->delete($id);
        }
    }
    public static function sum(){

        if(!empty($_POST)){
            $duomenys = new Duomenys;

            $user = $duomenys->show($_POST['id'] );

            if($_POST['currency'] == 'eur'){

                $user['eur'] += $_POST['sum'];
        
                $duomenys->update($_POST['id'], $user);

            }

            if($_POST['currency'] == 'usd'){

                $user['usd'] += $_POST['sum'];
        
                $duomenys->update($_POST['id'], $user);

            }
    
        }
    }
    public static function minus(){

       
        if(!empty($_POST)){
            $duomenys = new Duomenys;
            
            $user = $duomenys->show($_POST['id']);

            if($_POST['currency'] == 'eur'){

                $user['eur'] -= $_POST['sum'];
        
                $duomenys->update($_POST['id'], $user);

            }

            if($_POST['currency'] == 'usd'){

                $user['usd'] -= $_POST['sum'];
        
                $duomenys->update($_POST['id'], $user);

            }
    
        }
    }
    public static function addAvatar(){
        if(isset($_POST) && isset($_FILES['avatar'])){

            $duomenys = new Duomenys;
            
            $imgName = basename($_FILES['avatar']['name']);
            $duomenys->addPicture($imgName, $_POST['user-avatar']);

            $rootDir = str_replace('app', '', __DIR__);

            move_uploaded_file($_FILES['avatar']['tmp_name'], $rootDir.'db\pictures\\'.$imgName);
            
        }
    }
}