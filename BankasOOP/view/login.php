<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="./../public/css/reset.css">
    <link rel="stylesheet" href="./../public/css/main.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

</head>
<body>

    <div class="container">

        <div class="form">
            <h1>Prisijungimas</h1>

            <div class="line"></div>

            <form action="/grazus/BankasOOP/public/loging" method="post">

                <label for="name"> Vardas <br>
                    <input type="text" name="name"> <br>
                </label>
                <label for="password"> Slaptazodis <br>
                    <input type="password" name="password"> <br>
                </label>
                <button type="submit">Prisijungti</button>

            </form>
        </div>

        <div class="lock">
            <div class="lock-box">
                <i class="icon-lock"></i>
            </div>
        </div>
    </div>
</body>
</html>