<?php

namespace App\DB; use PDO;

use App\DB\DataBase; use App\App;


class Duomenys implements DataBase {
        public $pdo;

        public function __construct(){
            $this->connectDb();
        }

        public function connectDb (){

            $host = 'sql7.freemysqlhosting.net';
            $db   = 'sql7353873';
            $user = 'sql7353873';
            $pass = 'kxuyhFK7yX';
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

            $sql = "UPDATE user SET firstname=?, lastname=?, account=?, id=?, eur=?, usd=? WHERE id = $userId";
            
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([$userData['firstname'], $userData['lastname'], $userData['account'], $userData['id'], $userData['eur'], $userData['usd']]);

        }

        public function delete(int $userId) : void{

            $sql = "DELETE FROM user WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            
            $stmt->execute(['id' => $userId]);

        }

        public function show(int $userId) : array{

            $sql = "SELECT * FROM user WHERE id = $userId";

            $stmt = $this->pdo->query($sql);   
            
            $row = $stmt->fetch();

            return $row;

        }

        public function showAll() : array{

            $sql = "SELECT * FROM user";

            $stmt = $this->pdo->query($sql);
               
            $table = $stmt->fetchAll();

            $sorted = $this->sort($table);

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
            
                        $firstElement = strnatcmp($array[$i]['lastname'], $array[$i+1]['lastname']);
                        $secondElement = strnatcmp($array[$i+1]['lastname'], $array[$i]['lastname']);
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