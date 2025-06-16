<?php 

    class Database {
        private $pdo;
        private $stmt;

        public function __construct($host, $db, $user, $pass, $charset = 'utf8mb4'){
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            try {
                $this -> pdo = new PDO($dsn, $user, $pass, $options);
            }catch(PDOException $e){
                die("Database Connection Failed: " . $e->getMessage());
            }
        }

        // Prepare and execution a query
        public function query($sql, $params = []){
            $this->stmt = $this->pdo->prepare($sql);
            return $this->stmt->execute($params);
        }

        // Fetch a single record
        public function fetch($sql, $params = []){
            $this->query($sql, $params);
            return $this-> stmt-> fetch();
        }

        // Fetch all records
        public function fetchAll($sql, $params = []){
            $this -> query($sql, $params);
            return $this-> stmt -> fetchAll();
        }

        //Return last inserted ID
        public function lastInsertId(){
            return $this -> pdo -> lastInsertId();
        }
    }

