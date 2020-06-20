<?php
if(!empty($_POST) && !empty($_POST['name'])){

    $data = json_decode(file_get_contents(__DIR__ .'/data.json'),1);

    $name = $_POST['name'];
    $surename = $_POST['surename'];
    $account = $_POST['account'];
    $userNr = $_POST['user-nr'];

    $newObject = [
        'name'=> $name,
        'surename' => $surename,
        'account' => $account,
        'user-nr' => $userNr,
        'lesos' => 0
    ];

    $data[] = $newObject;

    file_put_contents(__DIR__ .'/data.json', json_encode($data));

}




_dc($_POST);


?>