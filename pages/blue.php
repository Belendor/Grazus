<?php

if(!empty($_GET)) {
    if($_GET['redirect'] == true){
        header("Location: /grazus/pages/red.php");
        die();
    }
}


$backgroundColor = 'blue';


$link = '<a href="/grazus/artur_dymchanka_7.php">Pirmas linkas (atgal)</a>'.'<br>';
$link2 = '<a href="/grazus/pages/blue.php?redirect=true">Linkas i save</a>'.'<br>';


echo '<div style="width: 100%; height: 100vh; background-color:'.$backgroundColor.'">'.$link.$link2.'</div>';