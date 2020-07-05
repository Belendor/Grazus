<?php
namespace App;

class FlashMessages {
    public static function message (){

        $message = '';
        $color = '';
        
        if(isset($_SESSION['note'])) {

            if($_SESSION['note']['message'] == 'error'){
                $color = 'red';
            }else{
                $color = 'green';
            }
        
            $message = $_SESSION['note']['text'];
            unset($_SESSION['note']);
            
        }

        return "<p style='background-color: $color; font-size: 22px; text-align:center'>$message</p>";
    }
}