<?php 

    class Database {
        private $stmt;
        private $pdo;

        public function __construct($username = 'root', $password = '4444', $charset='utf8mb4'){
            $dsn = "mysql:host=localhost;dbname=pdo1;charset=$charset";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            try {
                $this -> pdo = new PDO($dsn, $username, $password, $options);
                echo "Connection Successful";
            }catch(PDOException $e){
                die("Connection failed". $e-> getMessage());
            }
        }

        public function query($sql, $params = []){
            $this-> stmt = $this->pdo-> prepare($sql);
            return $this -> stmt-> execute($params);
        }

        public function fetch($sql, $params = []){
            $this->query($sql, $params);
            return $this->stmt -> fetch();
        }

        public function fetchAll($qdl, $params = []){
            $this->query($qdl, $params);
            return $this->stmt->fetchAll();
        }
    }

