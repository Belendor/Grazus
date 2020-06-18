<?php

if(!empty($_GET)) {
    if($_GET['redirect'] == true){
        header("Location: /grazus/pages/blue.php");
        die();
    }
}


$backgroundColor = 'red';


$link = '<a href="/grazus/artur_dymchanka_7.php">Pirmas linkas (atgal)</a>'.'<br>';
$link2 = '<a href="/grazus/pages/red.php?redirect=true">Linkas i save</a>'.'<br>';


echo '<div style="width: 100%; height: 100vh; background-color:'.$backgroundColor.'">'.$link.$link2.'</div>';