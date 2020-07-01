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

            if($value['user-nr'] == $_POST['user-nr']){
            
                $uniqueId = false;
            }
        }

        return true;
    }
}