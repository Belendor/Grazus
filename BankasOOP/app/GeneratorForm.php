<?php 

namespace App;

class GeneratorForm{
    public static function generateIban(){
        $string = 'LT';

        for($i = 0; $i<18; $i++){
            $randNr = rand(0,9);
            $string .= $randNr;
        }
    
        return $string;
    }
}