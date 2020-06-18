<?php 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// sleep(5);

    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1);

    if ($rawData['answer'] == 111) {
        $response = 'Pasirink kazka';
    }

    else {
        $response = ($rawData['answer'] == 3) ? '<span style="color:green;">Teisingai</span>' : 'Blogai';
    }

    $response = json_encode(['atsakymas' =>$response]);
    
    echo $response;
die();
}

$player1 = 0;
$player2 = 0;
