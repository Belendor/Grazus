<?php

use App\Db\Duomenys;
use App\App;

$duomenys = new Duomenys;
$user = $duomenys->show(App::$user);


$select = "<select name=\"currency1\">
        <option name=\"eur-input\" value=\"eur\">EUR</option>
        <option name=\"usd-input\" value=\"usd\">USD</option>
        </select>";

$select2 = "<select name=\"currency2\">
        <option name=\"eur-input\" value=\"eur\">EUR</option>
        <option name=\"usd-input\" value=\"usd\">USD</option>
        </select>";

$input = '<form action="./../change/'.App::$user.'" method="post">
        Iš '.$select.'  <input type="number" name="sum" min="0"> į   '.$select2.'
        <input type="hidden" name="id" value="'.$user['id'].'">
        <button type="submit">Konvertuoti Lesas</button>
        </form>';


$renderRow = '<tr>
            <td>'.$user['name'].'</td>
            <td>'.$user['surename'].'</td>
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

    <style>

        td, th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2;}

        tr:hover {background-color: #ddd;}

        th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #0092E1;
        color: white;
        }
        .menu{
            display: inline-block;
            padding: 5px 0;
        }

        a{
            font-family: 'SEB Sans Serif';
            text-decoration: unset;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .red{
            background-color: rgba(201, 63, 63, 0.74);
        }

        .green{
            background-color: rgba(35, 173, 35, 0.74);
        }

    </style> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurasyti lesas</title>
</head>
<body>

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
        <th>Ka norite keisti</th>

        <?=$renderRow ?? '' ?>

    </table>

    <div class="menu">
        <a href="./../saskaita">Sukurti nauja saskaita</a><br>
        <a href="./../sarasas">Perziureti saskaitu sarasa</a><br>
        <a href="./../login/logout">Atsijungti <i class="icon-signout text-icon"></i> </a><br>
    </div>
</body>
</html>