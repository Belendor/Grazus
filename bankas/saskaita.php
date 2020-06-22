<?php 

session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: /grazus/bankas/login.php');
    die();
}


if(!empty($_POST) && !empty($_POST['name'])){


    if(strlen($_POST['user-nr']) != 11){
        $_SESSION['note'] = 'Neteisingas asmens kodo formatas';
        header("Location: /grazus/bankas/saskaita.php");
        die();
    }

    if(strlen($_POST['name']) < 3){
        $_SESSION['note'] = 'Vardas yra per trumpas';
        header("Location: /grazus/bankas/saskaita.php");
        die();
    }

    if(strlen($_POST['surename']) < 3){
        $_SESSION['note'] = 'Pavarde yra per trumpa';
        header("Location: /grazus/bankas/saskaita.php");
        die();
    }



    $data = json_decode(file_get_contents(__DIR__ .'/data.json'),1);

    $uniqueId = true;


    foreach($data as $value){

        if($value['user-nr'] == $_POST['user-nr']){
           

            $uniqueId = false;
        }

    }

    if($uniqueId){

        $name = $_POST['name'];
        $surename = $_POST['surename'];
        $account = $_POST['account'];
        $userNr = $_POST['user-nr'];
    
        $newObject = [
            'name'=> $name,
            'surename' => $surename,
            'account' => $account,
            'user-nr' => $userNr,
            'lesos' => 0
        ];
    
        $data[] = $newObject;
    
        file_put_contents(__DIR__ .'/data.json', json_encode($data));

        $_SESSION['note'] = 'Nauja saskaita buvo uzregistruota';
        header("Location: /grazus/bankas/saskaita.php");
        die();

    }else{
        $_SESSION['note'] = 'Toks asmens kodas jau yra uzimtas';
        header("Location: /grazus/bankas/saskaita.php");
        die();
    }

}

function generateIban(){
    $string = 'LT';

    for($i = 0; $i<18; $i++){
        $randNr = rand(0,9);
        $string .= $randNr;
    }

    return $string;
}

function generateID(){
    $string = '';

    $string .= rand(1,6);
    $string .= str_pad(rand(0,99), 2, "0", STR_PAD_LEFT);
    $string .= str_pad(rand(0,12), 2, "0", STR_PAD_LEFT);
    $string .= str_pad(rand(0,31), 2, "0", STR_PAD_LEFT);

    for($i = 0; $i<4; $i++){
        $randNr = rand(0,9);
        $string .= $randNr;
    }

    return $string;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saskaitos</title>
</head>
<body>
    <p><?php  
    
        if(isset($_SESSION['note'])) {
            echo $_SESSION['note'];
            unset($_SESSION['note']);
        }
    
    ?></p><br>

    <form action="" method="post">
    <label for="name"> Vardas: <br>
        <input type="text" name="name"> <br>
    </label> 
    <label for="surename"> Pavarde: <br>
        <input type="text" name="surename"> <br>
    </label>
    <label for="account"> Saskaitos Numeris: <br>
        <input type="text" name="account" value="<?=generateIban()?>" readonly><br>
    </label>
    <label for="user-nr"> Asmens kodas:  <br>
        <input type="number" name="user-nr" value="<?=generateID()?>"><br>
    </label><br>
    <button type="submit">Ivesti nauja saskaita</button>
    </form>

    <a href="/grazus/bankas/saskaitu-sarasas.php">Perziureti visas saskaitas</a><br>
    <a href="/grazus/bankas/login.php?logout">Atsijungti</a><br>
</body>
</html>