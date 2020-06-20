<?php

$data = json_decode(file_get_contents(__DIR__ .'/data.json'),1);

$table = '';

function generateAdd ($name, $surename, $saskaita, $asmensKodas, $lesos){

    return '<form action="/grazus/bankas/prideti-lesas.php" method="post">
            <input type="hidden" name="name" value="'.$name.'">
            <input type="hidden" name="surename" value="'.$surename.'">
            <input type="hidden" name="account" value="'.$saskaita.'">
            <input type="hidden" name="user-nr" value="'.$asmensKodas.'">
            <input type="hidden" name="lesos" value="'.$lesos.'">
            <button type="submit">Prideti Lesas</button>
            </form>';
            
}

function generateRemove ($name, $surename, $saskaita, $asmensKodas, $lesos){

    return '<form action="/grazus/bankas/nuskaiciuoti-lesas.php" method="post">
            <input type="hidden" name="name" value="'.$name.'">
            <input type="hidden" name="surename" value="'.$surename.'">
            <input type="hidden" name="account" value="'.$saskaita.'">
            <input type="hidden" name="user-nr" value="'.$asmensKodas.'">
            <input type="hidden" name="lesos" value="'.$lesos.'">
            <button type="submit">Nurasyti Lesas</button>
            </form>';

}

function delete (){

    return '<form action="/grazus/bankas/saskaitu-sarasas.php" method="post">
            <input type="hidden" name="lesos" value="'.$lesos.'">
            <button type="submit">Nurasyti Lesas</button>
            </form>';

}

foreach($data as $value){

    $row = "<tr>
            <td>".$value['name']."</td>
            <td>".$value['surename']."</td>
            <td>".$value['account']."</td>
            <td>".$value['user-nr']."</td>
            <td>Istrinti | ".generateAdd($value['name'], $value['surename'], $value['account'], $value['user-nr'], $value['lesos'])." ".generateRemove($value['name'], $value['surename'], $value['account'], $value['user-nr'], $value['lesos'])." </td>
            </tr>";

    $table .= $row;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saskaitu sarasas</title>
    <style>
        table, th, td {
        border: 1px solid black;
        }
    </style>    
</head>
<body>

    <div style="width 100%; border: solid 1px black">
    <table style="width:100%">

        <tr>
        <th>Vardas</th>
        <th>Pavarde</th> 
        <th>Saskaita</th>
        <th>Asmens kodas</th>
        <th>Veiksmai</th>
        </tr>

        <?=$table?>

        </table>
    </div>

    <a href="/grazus/bankas/saskaita.php">Sukurti nauja saskaita</a>

</body>
</html>