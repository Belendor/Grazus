<?php

namespace App;

include 'DataBase.php';

class Duomenys implements DB\DataBase {

        public function __construct(){

        }

        public function create(array $userData) : void {
            $data = json_decode(file_get_contents(__DIR__ .'/data.json'),1);
            $data[] = $userData;
            file_put_contents(__DIR__ .'/data.json', json_encode($data));
        }

        public function update(int $userId, array $userData) : void{
            $data = json_decode(file_get_contents(__DIR__ .'/data.json'),1);

            foreach($data as $key => $user){
                if($userId == $data[$key]['user-nr']){
                    $data[$key] = $userData;
                }
            }
            file_put_contents(__DIR__ .'/data.json', json_encode($data));
        }

        public function delete(int $userId) : void{
            $data = json_decode(file_get_contents(__DIR__ .'/data.json'),1);

            foreach($data as $key => $user){
                if($userId == $data[$key]['user-nr']){
                    array_splice($data, $key, 1);
                }
            }

            file_put_contents(__DIR__ .'/data.json', json_encode($data));
        }

        public function show(int $userId) : array{

            $data = json_decode(file_get_contents(__DIR__ .'/data.json'),1);

            foreach($data as $key => $user){
                if($userId == $data[$key]['user-nr']){
                    return  $data[$key];
                }
            }
        }

        public function showAll() : array{
            $data = json_decode(file_get_contents(__DIR__ .'/data.json'),1);
            return $data;
        }

}