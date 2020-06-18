<?php
    session_start();

    $forma = '<form action="" method="post" >
            <label for="players">Zaidejo Nr1 vardas:</label><br>
            <input type="text" name="player1"><br>
            <label for="players">Zaidejo Nr2 vardas:</label><br>
            <input type="text" name="player2"><br>
            <button type="submit">Pradeti</button>
            </form>';

    $player1Name = $_SESSION['player1name'] ?? '';
    $player2Name = $_SESSION['player2name'] ?? '';
    $player1Score = $_SESSION['player1score'] ?? 0;
    $player2Score = $_SESSION['player2score'] ?? 0;

    $render = $forma;
    $win = '';

    function renderPlayer($player, $nr){

        $playerRoll = '';

        if($nr == 1){
            $playerRoll = 'roll1';
        }
        if($nr == 2){
            $playerRoll = 'roll2';
        }

        return '<p>Mesti klauliuka('.$player.')</p>
        <form action="" method="get" >
        <input type="hidden" name="'.$playerRoll.'" value="1">
        <button type="submit">Mesti</button>
        </form>';

    }

    if(!empty($_POST)){
        if(array_key_exists('player2', $_POST) && array_key_exists('player1', $_POST)){
            if(!empty($_POST['player1']) && !empty($_POST['player2'])){

                $_SESSION['player1name'] = $_POST['player1'];
                $_SESSION['player2name'] = $_POST['player2'];
    
                $render = renderPlayer($_POST['player1'], 1);


            }

        }else{
            echo "we got problem";
        }
    }

    if(!empty($_GET)){

        if( array_key_exists('roll1', $_GET)){

            $randomNr = rand(1, 6);

            if(array_key_exists('player1score', $_SESSION)){
                $_SESSION['player1score'] += $randomNr;
            }else{
                $_SESSION['player1score'] = $randomNr; 
            }

            $render = renderPlayer($player2Name, 2);
        }

        if( array_key_exists('roll2', $_GET)){

            $randomNr = rand(1, 6);

            if(array_key_exists('player2score', $_SESSION)){
                $_SESSION['player2score'] += $randomNr;
            }else{
                $_SESSION['player2score'] = $randomNr; 
            }

            $render = renderPlayer($player1Name, 1);
        } 

        if( array_key_exists('win1', $_GET)){
            $win = 'First player has won. Congratulations!';
        }

        if( array_key_exists('win2', $_GET)){
            $win = 'Second player has won. Congratulations!';
        }
        

    }    
    
    if(array_key_exists('player1score', $_SESSION)){
        if($_SESSION['player1score'] >= 30 ){
            session_destroy();
            header("Location: /grazus/pages/game.php?win1");
            die();
        }
    }
    if(array_key_exists('player2score', $_SESSION)){
        if($_SESSION['player2score'] >= 30 ){
            session_destroy();
            header("Location: /grazus/pages/game.php?win2");
            die();
        }
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
    <?=$win ?? ''?>
    <?=$render?>
    <p>Player 1 Score:</p>
    <?=$_SESSION['player1score'] ?? 0?>
    <p>Player 2 Score:</p>
    <?=$_SESSION['player2score'] ?? 0?> 

</body>
</html>