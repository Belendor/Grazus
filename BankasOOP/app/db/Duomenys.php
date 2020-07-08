<?php

namespace App\DB; use PDO;

use App\DB\DataBase; use App\App;


class Duomenys implements DataBase {
        public $pdo;

        public function __construct(){
            $this->connectDb();
        }

        public function connectDb (){

            $host = 'localhost';
            $db   = 'users';
            $user = 'root';
            $pass = '';
            $charset = 'utf8mb4';
    
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
    
            try {
                $this->pdo = new PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        public function create(array $userData) : void {
            
            $sql = "INSERT INTO user (firstname, lastname, account, id, eur, usd) VALUES (:firstname, :lastname, :account, :id, :eur, :usd)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($userData);
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

            $sorted = $this->sort($data);

            return $sorted;

        }

        private function sort(array $userData) {

            function bubleSort($array){
                $swapped;
                do{
                    $swapped = false;
                    for($i = 0; $i < count($array) - 1; $i++){
            
                        //------------------------------------------
                        // Irasyti kokias arejaus reiksmes lyginti
                        //------------------------------------------
            
                        $firstElement = strnatcmp($array[$i]['surename'], $array[$i+1]['surename']);
                        $secondElement = strnatcmp($array[$i+1]['surename'], $array[$i]['surename']);
                        // -----------------------------------------
            
            
                        if($firstElement > $secondElement){ // '>' Didejimo tvarka, '<' Mazejimo tvarka.
                            $temp = $array[$i];
                            $array[$i] = $array[$i + 1];
                            $array[$i + 1] = $temp;
                            $swapped = true;
                        }
                    }
                }while($swapped);
                return $array;
            }

            return bubleSort($userData);
        }

}