<?php use App\Db\Duomenys; use App\FlashMessages;

$duomenys = new Duomenys;
$data = $duomenys->showAll();

$table = '';

foreach($data as $value){

    $avatar = '';

    if(isset($value['fname'])){
        $avatar = '<img class="img-box" src="./../db/pictures/'.$value['fname'].'" alt="'.$value['fname'].'">';
    }

    $delete = '<a style="color:red" href="./../public/delete/'.$value['id'].'">Istrinti <i class="icon-trash"></i> </a>';
    $add = '<a style="color:green" href="./../public/add/'.$value['id'].'">Prideti <i class="icon-plus"></i></a>';
    $minus = '<a style="color:orange" href="./../public/minus/'.$value['id'].'">Nuimti <i class="icon-minus"></i> </a>';
    $change = '<a style="color:black" href="./../public/change/'.$value['id'].'">Keisti valiuta <i class="icon-usd"></i></a>';

    $upload = '<div class="upload-box"><form action="./../public/sarasas" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user-avatar" value="'.$value['id'].'">
            Avatar: <input id="file-input" type="file" name="avatar">
            <button type="submit">Add!!!</button>
            </form></div>';

    $row = "<tr>
            <td>".$avatar.$value['firstname']."</td>
            <td>".$value['lastname']."</td>
            <td>".$value['account']."</td>
            <td>".$value['id']."</td>
            <td> $delete | $add | $minus | $change | $upload</td>
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

    <?=FlashMessages::message()?>

    <div style="width 100%; border: solid 1px black">

        <table style="width:100%">

            <tr> <th>Vardas</th>  <th>Pavarde</th> <th>Saskaita</th> <th>Asmens kodas</th> <th>Veiksmai</th> </tr>

            <?=$table?>

        </table>    
    </div>
</body>
</html>