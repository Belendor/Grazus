<?php

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /grazus/bankas/login.php');
    die();
}

if (isset($_SESSION['login'])) {
    header('Location: /grazus/bankas/saskaitu-sarasas.php');
    die();
}


if(!empty($_POST)){

    $data = json_decode(file_get_contents(__DIR__ .'/admin.json'),1);

        foreach($data as $arr){

            if($_POST['name'] == $arr['name']){
                if(md5($_POST["password"]) == $arr["password"]){
                    _d('authenticated');
                    $_SESSION['login'] = 1;
                    header('Location: /grazus/bankas/saskaitu-sarasas.php');
                    die();
                };
            }
        }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form action="" method="post">
    <label for="name"> Vardas: <br>
        <input type="text" name="name"> <br>
    </label> 
    <label for="password"> Slaptazodis: <br>
        <input type="password" name="password"> <br>
    </label>
    <button type="submit">Prisijungti</button>
    </form>

</body>
</html>