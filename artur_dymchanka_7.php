<?php
// 1.

$backgroundColor = 'black';

if(!empty($_GET)) {
    if(array_key_exists('color', $_GET)){
        if($_GET['color'] == 1){
            $backgroundColor = 'red';
        }else{
            $backgroundColor = '#'.$_GET['color'];
        }
    }else{
        $backgroundColor = 'green';
    }
}

if(!empty($_POST)){
    $backgroundColor = 'yellow';
}


$link = '<a style="color:white" href="/grazus/artur_dymchanka_7.php">Pirmas linkas (juoda)</a>'.'<br>';
$link2 = '<a style="color:white" href="/grazus/artur_dymchanka_7.php?color=1">Antras linkas (raudona)</a>'.'<br>';
$link3 = '<a style="color:white" href="/grazus/artur_dymchanka_7.php?color=0080ff">Trecias linkas (melyna)</a>'.'<br>';
$link4 = '<a style="color:white" href="/grazus/pages/lemon.php">Linkas i lemon</a>'.'<br>';
$link5 = '<a style="color:white" href="/grazus/pages/blue.php">Linkas i blue</a>'.'<br>';
$link6 = '<a style="color:white" href="/grazus/pages/game.php">Zaidimas</a>'.'<br>';


$form = '<form action="" method="get">
        <label style="color:white">Spalva: </label>
        <input type="text" name="color">
        <br>
        <button type="submit">Varyk!</button>
        </form>';

$form2 = '<form action="" method="get" name="button">
        <br>
        <button type="submit" name="button" value="pressed">GET</button>
        </form>';

$form3 = '<form action="" method="post" name="button">
        <br>
        <button type="submit" name="button" value="pressed">POST</button>
        </form>';


echo '<div style="width: 100%; height: 100vh; background-color:'.$backgroundColor.'">'.$link.$link2.$link3.$link4.$link5.$link6.$form.$form2.$form3.'</div>';

// 2.
// 3.
