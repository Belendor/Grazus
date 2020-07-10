<?php use App\Db\Duomenys; use App\App; use App\Change; use App\FlashMessages;
$duomenys = new Duomenys; $user = $duomenys->show(App::$user);

$select = "<select id=\"select1\" name=\"currency1\">
        <option name=\"eur-input\" value=\"eur\">EUR</option>
        <option name=\"usd-input\" value=\"usd\">USD</option>
        </select>";

$select2 = "<select id=\"select2\" name=\"currency2\">
        <option name=\"eur-input\" value=\"eur\">EUR</option>
        <option name=\"usd-input\" value=\"usd\">USD</option>
        </select>";

$input = '<form action="./../change/'.App::$user.'" method="post" id="form">
        Iš '.$select.'  <input id="form-input" type="number" step="0.01" name="sum" min="0" required> į   '.$select2.'
        <input type="hidden" name="id" value="'.$user['id'].'">
        <button id="submit" type="submit">Keisiti</button>
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
    <link rel="stylesheet" href="./../css/keisti.css">    
    <link rel="stylesheet" href="./../css/nav.css">
    <link rel="stylesheet" href="./../css/table.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>

    <div class="navBar">    
        <a class="navButton logout" href="./../login/logout">Atsijungti <i class="icon-signout text-icon"></i> </a>
        <a class="navButton" href="./../saskaita">Nauja saskaita <i class="icon-file-text-alt"></i></a>
        <a class="navButton" href="./../sarasas">Saskaitu sarasa <i class="icon-list"></i></a>
    </div>

    <div class="alert-box">
        <div class="inner-box"> 

        <div class="message-box"></div>

        <div>
            <button class="alert-button">Sutinku</button>
            <button class="alert-decline">Nesutinku</button>

        </div>
        </div>
       
    </div>

    <div class="change-container">
        <div class="change-box">
            <p><img class="usd" src="https://www.seekpng.com/png/full/836-8364774_euro-flag-round-europe-flag.png" alt="EUR">1 EUR = <span id="EURtoUSD"><?=number_format(Change::getEURtoUSD(), 4)?></span>  USD <img  src="http://yachtregistration.net/wp-content/uploads/2019/07/united_states_of_america_640.png" alt="USD"></p> 
            <p><img  src="http://yachtregistration.net/wp-content/uploads/2019/07/united_states_of_america_640.png" alt="USD">1 USD = <span id="USDtoEUR"><?=number_format(Change::getUSDtoEUR(), 4)?></span>  EUR <img class="usd" src="https://www.seekpng.com/png/full/836-8364774_euro-flag-round-europe-flag.png" alt="EUR"></p>
            <p>Duomenys atnaujinti pries <?=time() - $_SESSION["USDtoEUR"]["timestamp"] ?> sekundziu</p>
        </div>
    </div>
    <?=FlashMessages::message()?>

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

    <script src="./../js/keisti.js"></script>
</body>
</html>