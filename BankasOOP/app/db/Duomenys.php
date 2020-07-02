<?php

namespace App\DB;

use App\DB\DataBase;


class Duomenys implements DataBase {

        public function __construct(){

        }

        public function create(array $userData) : void {

            $data = json_decode(file_get_contents('./../db/data.json'),1);
            $data[] = $userData;
            file_put_contents('./../db/data.json', json_encode($data));

        }

        public function update(int $userId, array $userData) : void{
            $data = json_decode(file_get_contents('C:\xampp\htdocs\Grazus\BankasOOP\db\data.json'),1);

            foreach($data as $key => $user){
                if($userId == $data[$key]['id']){
                    $data[$key] = $userData;
                }
            }
            file_put_contents('C:\xampp\htdocs\Grazus\BankasOOP\db\data.json', json_encode($data));
        }

        public function delete(int $userId) : void{

            $data = json_decode(file_get_contents('C:\xampp\htdocs\Grazus\BankasOOP\db\data.json'),1);

            foreach($data as $key => $user){
                if($userId == $data[$key]['id']){
                    array_splice($data, $key, 1);
                }
            }

            file_put_contents('C:\xampp\htdocs\Grazus\BankasOOP\db\data.json', json_encode($data));
        }

        public function show(int $userId) : array{

            $data = json_decode(file_get_contents('C:\xampp\htdocs\Grazus\BankasOOP\db\data.json'),1);



            foreach($data as $key => $user){

                if($userId == $user['id']){

                    return  $data[$key];
                }
            }
        }

        public function showAll() : array{
            
            $data = json_decode(file_get_contents('C:\xampp\htdocs\Grazus\BankasOOP\db\data.json'),1);
            return $data;

        }

}