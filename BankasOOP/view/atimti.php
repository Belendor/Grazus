<?php

use App\Db\Duomenys;
use App\App;

$duomenys = new Duomenys;

if(isset(App::$user)){
    $user = $duomenys->show(App::$user);
}

$select = "<select name=\"currency\">
        <option name=\"eur-input\" value=\"eur\">EUR</option>
        <option name=\"usd-input\" value=\"usd\">USD</option>
        </select>";

$input = '<form action="./../minus/'.App::$user.'" method="post">
        <input type="number" name="sum" min="0">  '.$select.'
        <input type="hidden" name="id" value="'.$user['id'].'">
        <button id="submit" type="submit">Atimnti Lesas</button>
        </form>';

$renderRow = '<tr>
            <td>'.$user['firstname'].'</td>
            <td>'.$user['lastname'].'</td>
            <td>'.$user['account'].'</td>
            <td>'.$user['id'].'</td>
            <td>'.$user['eur'].'</td>
            <td>'.$user['usd'].'</td>
            <td>'.$input.'</td>
            </tr>';


if(isset($_SESSION['note'])){
    if($_SESSION['note']['message'] == 'message'){
        $errorColor = 'green';
    }else{
        $errorColor = 'red';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurasyti lesas</title>
    <link rel="stylesheet" href="./../css/reset.css">    
    <link rel="stylesheet" href="./../css/nav.css">
    <link rel="stylesheet" href="./../css/table.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>

    <div class="navBar">
        <a class="navButton logout" href="./../public/login/logout">Atsijungti <i class="icon-signout text-icon"></i> </a>
        <a class="navButton" href="./../saskaita">Nauja saskaita <i class="icon-file-text-alt"></i></a>
        <a class="navButton" href="./../sarasas">Saskaitu sarasa <i class="icon-list"></i></a>
    </div>

    <p class="<?=$errorColor?> "><?php  
        
        if(isset($_SESSION['note'])) {
        
            echo $_SESSION['note']['text'];
            unset($_SESSION['note']);
            
        }

    ?></p><br>

    <table style="width:100%">
        <th>Vardas</th>
        <th>Pavarde</th> 
        <th>Saskaita</th>
        <th>Asmens kodas</th>
        <th>Eurai</th>
        <th>Doleriai</th>
        <th>Kokia suma atimti?</th>

        <?=$renderRow ?? '' ?>

    </table>

</body>
</html>