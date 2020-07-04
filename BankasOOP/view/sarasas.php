<?php
use App\Db\Duomenys;

$duomenys = new Duomenys;
$data = $duomenys->showAll();

$table = '';

foreach($data as $value){

    $delete = '<a style="color:red" href="./../public/delete/'.$value['id'].'">Istrinti <i class="icon-trash"></i> </a>';
    $add = '<a style="color:green" href="./../public/add/'.$value['id'].'">Prideti <i class="icon-plus"></i></a>';
    $minus = '<a style="color:orange" href="./../public/minus/'.$value['id'].'">Nuimti <i class="icon-minus"></i> </a>';
    $change = '<a style="color:black" href="./../public/change/'.$value['id'].'">Keisti valiuta <i class="icon-usd"></i></a>';

    $row = "<tr>
            <td>".$value['name']."</td>
            <td>".$value['surename']."</td>
            <td>".$value['account']."</td>
            <td>".$value['id']."</td>
            <td> $delete | $add | $minus | $change </td>
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
    <link rel="stylesheet" href="./../public/css/reset.css">    
    <link rel="stylesheet" href="./../public/css/nav.css">
    <link rel="stylesheet" href="./../public/css/table.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
    <div class="navBar">
        <a class="navButton logout" href="./../public/login/logout">Atsijungti <i class="icon-signout text-icon"></i> </a>
        <a class="navButton" href="./../public/saskaita">Nauja saskaita <i class="icon-file-text-alt"></i></a>
    </div>

    <p class="<?=$errorColor?> "><?php  
        
        if(isset($_SESSION['note'])) {
        
            echo $_SESSION['note']['text'];
            unset($_SESSION['note']);
            
        }

    ?></p><br>

    <div style="width 100%; border: solid 1px black">

        <table style="width:100%">

            <tr> <th>Vardas</th>  <th>Pavarde</th> <th>Saskaita</th> <th>Asmens kodas</th> <th>Veiksmai</th> </tr>

            <?=$table?>

        </table>
        
    </div>

</body>
</html>