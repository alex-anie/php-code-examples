<?php
    abstract class Db{
        // Class properties
        private static $username = "root";
        private static $password = "4444";
        private static $dsn = "mysql:host=localhost;dbname=pdo-vs-mysqli;charset=utf8";
        public static $affected_rows;
        
        // Class methods
        public static function connect(){
            try{
                $pdo = new PDO(self::$dsn, self::$username, self::$password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connection success";
            }catch(PDOException $e){
                error_log(date('Y-m-d H:i:s') . "Database connection error" . $e->getMessage(), 3, "error.log");
                throw new Exception("Database connection failed");
            }

            return $pdo;
        }

        // QUERY = to create, update and delete from the database
        public static function query($sql, $binding_values = []){
            try{
                $pdo = self::connect();
                $query = $pdo->prepare($sql);
                $query->execute($binding_values);
                self::$affected_rows = $query->rowCount();
                $query = null; 
                $pdo = null;
            }catch(PDOException $e){
                error_log(date('Y-m-d H:i:s') . "Database connection error" . $e->getMessage(), 3, "error.log");
                throw new Exception("Error Executing query");
            }
        }

        // To read all data from the database
        public static function select($sql, $binding_values = []){
            try{
                $pdo = self::connect();
                $query = $pdo->prepare($sql);
                $query->execute($binding_values);
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                $query = null; 
                $pdo = null;
                return $data;
            }catch(PDOException $e){
                error_log(date('Y-m-d H:i:s') . "Database connection error" . $e->getMessage(), 3, "error.log");
                throw new Exception("Error Executing select query");
            }
        }
    }