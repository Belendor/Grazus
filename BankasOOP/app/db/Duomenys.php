<?php

namespace App\DB; use PDO;

use App\DB\DataBase; use App\App;


class Duomenys implements DataBase {
        public static $pdo;

        public function __construct(){
            $this->connectDb();
        }

        public function connectDb (){
            if(!isset(self::$pdo)){

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
                    self::$pdo = new PDO($dsn, $user, $pass, $options);
                    self::$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
                } catch (\PDOException $e) {
                    throw new \PDOException($e->getMessage(), (int)$e->getCode());
                }

            }


            // try {
            //     $sql = "CREATE TABLE IF NOT EXISTS user (
            //         firstname VARCHAR(30) NOT NULL,
            //         lastname VARCHAR(30) NOT NULL,
            //         account VARCHAR(30) NOT NULL,
            //         id BIGINT(50) UNSIGNED PRIMARY KEY,
            //         eur DECIMAL(20,2) NOT NULL,
            //         usd DECIMAL(20,2) NOT NULL,
            //         reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            //         )";
                  
            //         self::$pdo->exec($sql);
            //         echo "USER created successfully";
            //       } catch(PDOException $e) {
            //         echo $sql . "<br>" . $e->getMessage();
            //     }

            // try {
            //     $sql = "CREATE TABLE IF NOT EXISTS picture (

            //         fname VARCHAR(50) NOT NULL,
            //         userID BIGINT(50) UNSIGNED PRIMARY KEY,
            //         reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            //         FOREIGN KEY (userID) REFERENCES user(id)
            //         )";
                  
            //         self::$pdo->exec($sql);
            //         echo "<br>pictures created successfully";
            //       } catch(PDOException $e) {
            //         echo $sql . "<br>" . $e->getMessage();
            // }

        }

        public function create(array $userData) : void {
            
            $sql = "INSERT INTO user (firstname, lastname, account, id, eur, usd) VALUES (:firstname, :lastname, :account, :id, :eur, :usd)";

            $stmt = self::$pdo->prepare($sql);

            $stmt->execute($userData);
        }

        public function update(int $userId, array $userData) : void{

            $sql = "UPDATE user SET firstname=?, lastname=?, account=?, id=?, eur=?, usd=? WHERE id = $userId";
            
            $stmt = self::$pdo->prepare($sql);

            $stmt->execute([$userData['firstname'], $userData['lastname'], $userData['account'], $userData['id'], $userData['eur'], $userData['usd']]);

        }

        public function delete(int $userId) : void{

            $sql = "DELETE FROM user WHERE id = :id";

            $stmt = self::$pdo->prepare($sql);
            
            $stmt->execute(['id' => $userId]);

        }

        public function show(int $userId) : array{

            $sql = "SELECT * FROM user WHERE id = $userId";

            $stmt = self::$pdo->query($sql);   
            
            $row = $stmt->fetch();

            return $row;
        }

        public function showAll() : array{

            $sql ="SELECT *
            FROM user
            Left JOIN picture
            ON user.id = picture.userID";

            $stmt = self::$pdo->query($sql);
            
            $table = $stmt->fetchAll();

            _d($table);

            $sorted = $this->sort($table);

            return $sorted;

        }
        public function addPicture($filename, $userID){

            if(!isset($user['fname'])){
                $sql = "INSERT INTO picture (fname, userID) VALUES (?, ?)";
                $stmt = self::$pdo->prepare($sql);
                $stmt->execute([$filename, $userID]);

            }else{
                _d('avataras priskirtas');
            }
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