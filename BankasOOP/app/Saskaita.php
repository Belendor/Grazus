<?php
namespace App;

use App\Duomenys;

class Saskaita {
    public static function add(){

        if(!empty($_POST)){
    
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
}