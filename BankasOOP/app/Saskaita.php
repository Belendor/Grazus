<?php
namespace App;

use App\DB\Duomenys;

class Saskaita {

    public static function add(){

        if(!empty($_POST) && self::validateId()){
    
        $newObject = [
            'name'=> $_POST['name'],
            'surename' => $_POST['surename'],
            'account' => $_POST['account'],
            'id' => $_POST['id'],
            'lesos' => 0
        ];

        $duomenys = new Duomenys;
        $duomenys->create($newObject);

        }
    }

    public static function validateId(){
        $duomenys = new Duomenys;
        $data = $duomenys->showAll();

        foreach($data as $value){

            if($value['id'] == $_POST['id']){
            
                $uniqueId = false;
            }
        }

        return true;
    }

    public static function remove($id){

        $duomenys = new Duomenys;
        $duomenys->delete($id);

    }

    public static function sum(){

       
        if(!empty($_POST)){
            $duomenys = new Duomenys;

            $user = $duomenys->show($_POST['id'] );

            $user['lesos'] += $_POST['sum'];
    
            $duomenys->update($_POST['id'], $user);
    
        }
    }

    public static function minus(){

       
        if(!empty($_POST)){
            $duomenys = new Duomenys;

            $user = $duomenys->show($_POST['id'] );

            $user['lesos'] -= $_POST['minus'];
    
            $duomenys->update($_POST['id'], $user);
    
        }
    }
}