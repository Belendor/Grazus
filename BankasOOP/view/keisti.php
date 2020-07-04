<?php use App\Db\Duomenys; use App\App; use App\Change;
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
        <button id="submit" type="submit">Konvertuoti Lesas</button>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurasyti lesas</title>
    <link rel="stylesheet" href="./../css/reset.css">
    <link rel="stylesheet" href="./../css/keisti.css">
</head>
<body>

    <div class="alert-box">
        <div class="message-box"></div><br>
        <button class="alert-button">Sutinku</button>
        <button class="alert-decline">Nesutinku</button>
    </div>

    <p class="<?=$errorColor?> "><?php  
        
        if(isset($_SESSION['note'])) {
        
            echo $_SESSION['note']['text'];
            unset($_SESSION['note']);
            
        }

    ?></p><br>

    <div>
        Valiutu kursai: 1 EUR = <span id="EURtoUSD"><?=Change::getEURtoUSD()?></span>  USD, 1 USD = <span id="USDtoEUR"><?=Change::getUSDtoEUR()?></span> EUR. Duomenys atnaujinti prie <?=time() - $_SESSION["USDtoEUR"]["timestamp"] ?> sekundziu.
    </div>

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

    <script src="./../js/keisti.js"></script>
</body>
</html>