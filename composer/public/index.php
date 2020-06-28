<?php

require '..\vendor\autoload.php';

define('DIR', '/grazus/composer/public/');


$userData = [
    'name'=> 'testName',
    'surename' => 'testUsername',
    'account' => 'account',
    'user-nr' => 12345,
    'lesos' => '0'
];



$duomenys = new App\Duomenys();

$duomenys -> create($userData);
$duomenys -> update(12345, $userData);

