<?php
// 1.

$backgroundColor = 'black';

if(!empty($_GET)) {
    if($_GET['color'] == 1){
        $backgroundColor = 'red';
    }else{
        $backgroundColor = '#'.$_GET['color'];
    }
}



$link = '<a href="/grazus/artur_dymchanka_7.php">Pirmas linkas (juoda)</a>'.'<br>';
$link2 = '<a href="/grazus/artur_dymchanka_7.php?color=1">Antras linkas (raudona)</a>'.'<br>';
$link3 = '<a href="/grazus/artur_dymchanka_7.php?color=0080ff">Trecias linkas (melyna)</a>'.'<br>';
$link4 = '<a href="/grazus/pages/lemon.php">Linkas i lemon</a>'.'<br>';


$form = '<form action="" method="get">
        Spalva: <input type="text" name="color">
        <br>
        <button type="submit">Varyk!</button>
        </form>';


echo '<div style="width: 100%; height: 100vh; background-color:'.$backgroundColor.'">'.$link.$link2.$link3.$link4.$form.'</div>';

// 2.
// 3.
