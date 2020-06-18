<?php


    $forma = '<form action="" method="post" >
            <label for="players">Zaidejo Nr1 vardas:</label><br>
            <input type="text" name="player1"><br>
            <label for="players">Zaidejo Nr2 vardas:</label><br>
            <input type="text" name="player2"><br>
            <button type="submit">Pradeti</button>

            </form>';

    $player1Name = '';
    $player2Name = '';
    $player1Score = 0;
    $player2Score = 0;

    $render = $forma;

    _dc($_GET);

    function renderPlayer($player, $score){

        return '<p>Mesti klauliuka('.$player.')</p>
        <form action="" method="get" >
        <input type="hidden" name="roll" value="1">
        <input type="hidden" name="current" value="'.$score.'">
        <button type="submit" value="roll1">Mesti</button>
        </form>';

    }

    if(!empty($_POST)){
        if(array_key_exists('player2', $_POST) && array_key_exists('player1', $_POST)){
            if(!empty($_POST['player1']) && !empty($_POST['player2'])){
                $player1Name = $_POST['player1'];
                $player2Name = $_POST['player2'];
    
                $render = renderPlayer($player1Name, $player1Score);
            }

        }else{
            echo "we got problem";
        }
    }

    if(!empty($_GET)){


        $render = renderPlayer($player1Name, $player1Score);
        $player1Score += 2;
    }       


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
</head>
<body>

    <?=$render?>
    <p>Player 1 Score:</p>
    <?=$player1Score?>
    <p>Player 2 Score:</p>
    <?=$player2Score?>

    

</body>
</html>