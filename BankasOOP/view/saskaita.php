<?php
use App\GeneratorForm;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saskaitos</title>

    <link rel="stylesheet" href="./../public/css/reset.css">
    <link rel="stylesheet" href="./../public/css/main.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

</head>
<body>

    <div class="container">
        <div class="form">
            <h1>Nauja Saskaita</h1>

            <div class="line"></div>
            
            <form action="/grazus/BankasOOP/public/add" method="post">
                <label for="name"> Vardas: <br>
                    <input id="input-name" type="text" name="name" value="<?=GeneratorForm::generateName()?>" required> <br>
                    <p class="name-error error"></p>
                </label> 
                <label for="surename"> Pavarde: <br>
                    <input id="input-surename" type="text" name="surename" value="<?=GeneratorForm::generateName()?>" required> <br>
                    <p class="surename-error error"></p>
                </label>
                <label for="account"> Saskaitos Numeris: <br>
                    <input type="text" name="account" readonly value="<?=GeneratorForm::generateIban()?>"  required><br>
                </label>
                <label for="user-nr"> Asmens kodas:  <br>
                    <input id="input-id" type="number" name="id" value="<?=GeneratorForm::generateId()?>" required><br>
                    <p class="id-error error"></p>
                </label>
                <button type="submit">Prideti</button>
            </form>

            <div class="line"></div>

            <div class="menu">
                <a href="./../public/sarasas">Perziureti saskaitu sarasa <i class="text-icon icon-external-link"></i></a><br>
                <a href="./../public/login/logout">Atsijungti <i class="icon-signout text-icon"></i> </a><br>
            </div>

        </div>

        <div class="lock">
            <div class="lock-box">
                 <i class="icon-user"></i>
            </div>
        </div>
    </div>

    <script src="./js/script.js"></script>

</body>
</html>