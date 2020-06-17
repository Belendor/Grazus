<?php
// 1.

header("Location: /grazus/pages/orange.php");
die();

$backgroundColor = 'yellow';


$link = '<a href="/grazus/artur_dymchanka_7.php">Pirmas linkas (atgal)</a>'.'<br>';
$link2 = '<a href="/grazus/pages/orange.php">Linkas i orange</a>'.'<br>';


echo '<div style="width: 100%; height: 100vh; background-color:'.$backgroundColor.'">'.$link.$link2.'</div>';

