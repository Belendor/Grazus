<?php

require __DIR__ . '/bootstarp.php';

if(!isset($_SESSION['login']) || $_SESSION['login'] !=1){
    header('Location: http://localhost/grazus/login/login.php');
    die();
}

echo 'slaptas';