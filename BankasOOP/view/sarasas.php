<?php
use App\Db\Duomenys;

$duomenys = new Duomenys;
$data = $duomenys->showAll();

$table = '';

foreach($data as $value){

    $delete = '<a href="./../public/delete/'.$value['id'].'">Istrinti</a>';
    $add = '<a href="./../public/add/'.$value['id'].'">Prideti</a>';
    $minus = '<a href="./../public/minus/'.$value['id'].'">Nuimti</a>';
    $change = '<a href="./../public/change/'.$value['id'].'">Keisti valiuta</a>';

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

        button{
            width: 110px;
            margin-bottom: 2px;
            cursor: pointer;    
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
</head>
<body>

    <p class="<?=$errorColor?> "><?php  
        
        if(isset($_SESSION['note'])) {
        
            echo $_SESSION['note']['text'];
            unset($_SESSION['note']);
            
        }

    ?></p><br>

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

    <div class="menu">
        <a href="./../public/saskaita">Sukurti nauja saskaita</a><br>
        <a href="./../public/login/logout">Atsijungti <i class="icon-signout text-icon"></i> </a><br>
    </div>   

</body>
</html>