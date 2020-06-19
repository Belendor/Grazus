<?php 

if(!empty($_POST) && !empty($_POST['name'])){

    $data = json_decode(file_get_contents(__DIR__ .'/data.json'),1);

    print_r($data);
    print_r($_POST);

    $name = $_POST['name'];
    $surename = $_POST['surename'];
    $account = $_POST['account'];
    $userNr = $_POST['user-nr'];
}else{
    echo 'empty';
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
    
    <form action="" method="post">
    <label for="name"> Vardas: <br>
        <input type="text" name="name"> <br>
    </label> 
    <label for="surename"> Pavarde: <br>
        <input type="text" name="surename"> <br>
    </label>
    <label for="account"> Saskaitos Numeris: <br>
        <input type="text" name="account"><br>
    </label>
    <label for="user-nr"> Asmens kodas:  <br>
        <input type="text" name="user-nr"><br>
    </label><br>
    <button type="submit">Ivesti nauja saskaita</button>
    </form>


</body>
</html>